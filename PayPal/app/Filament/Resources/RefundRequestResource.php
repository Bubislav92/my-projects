<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefundRequestResource\Pages;
use App\Models\RefundRequest;
use App\Models\AdminLog;
use Illuminate\Support\Facades\Auth;
use App\Mail\RefundApprovedMail;
use App\Mail\RefundRejectedMail;
use App\Services\PayPalService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;


class RefundRequestResource extends Resource
{
    protected static ?string $model = RefundRequest::class;

    protected static ?string $navigationGroup = 'Payment / PayPal';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function eagerLoadRelations(): array
    {
        return ['payment'];
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('id')->disabled(),
            TextInput::make('user_id')->label('User ID')->disabled(),
            Placeholder::make('payment_id')->label('Payment ID')->content(fn ($record) => $record->payment?->payment_id ?? '-'),
            Placeholder::make('capture_id')->label('PayPal ID')->content(fn ($record) => $record->payment?->capture_id ?? '-'),
            Placeholder::make('payer_email')->label('Email')->content(fn ($record) => $record->payment?->payer_email ?? '-'),
            TextInput::make('refund_id')->label('Refund ID')->disabled(),
            TextInput::make('reason')->label('Reason')->disabled(),
            TextInput::make('status')->label('Status')->disabled(),
            TextInput::make('created_at')->disabled(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('user_id')->label('User ID'),
                TextColumn::make('payment.payment_id')->label('Payment ID'),
                TextColumn::make('payment.capture_id')->label('PayPal ID'),
                TextColumn::make('payment.payer_email')->label('Email'),
                TextColumn::make('refund_id')->label('Refund ID'),
                TextColumn::make('reason')->label('Reason')->limit(200),
                TextColumn::make('status')->label('Status')->badge(),
                TextColumn::make('created_at')->label('Requested')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('status')->label('Request Status')->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                    'refunded' => 'Refunded',
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-m-check')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (RefundRequest $record, PayPalService $paypal) {
                        
                        if ($record->status === 'refunded') {
                            session()->flash('warning', 'The refund has already been processed.');
                            return;
                        }

                        $payment = $record->payment;
                        $captureId = $payment->capture_id;

                        if (! $captureId) {
                            session()->flash('error', 'There is no capture ID for this payment.');
                            return;
                        }

                        $resp = $paypal->refundCapture($captureId);

                        if ($resp && ($resp['status'] ?? '') === 'COMPLETED') {
                            $record->update([
                                'status' => 'refunded',
                                'refund_id' => $resp['id'] ?? null,
                                'refunded_at' => now(),
                            ]);

                            AdminLog::create([
                                'refund_request_id' => $record->id,
                                'admin_id' => Auth::id(),
                                'action' => 'approved',
                            ]);
                
                            // PDF
                            $pdf = Pdf::loadView('pdf.refund_invoice', [
                                'refund' => $record,
                                'payment' => $payment,
                            ]);

                            Mail::to($payment->payer_email)->send(new RefundApprovedMail($record));
                            session()->flash('success', 'Refund successful and email sent to the user.');
                        } else {
                            session()->flash('error', 'Refund unsuccessful, check the log.');
                        }
                    })
                    ->visible(fn ($record) => $record->status === 'pending'),

                Tables\Actions\Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-m-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (RefundRequest $record) {
                        $record->update(['status' => 'rejected']);

                        AdminLog::create([
                            'refund_request_id' => $record->id,
                            'admin_id' => Auth::id(),
                            'action' => 'rejected',
                        ]);

                        Mail::to($record->payment->payer_email)->send(new RefundRejectedMail($record));
                        session()->flash('info', 'Request rejected and user has been notified.');
                    })
                    ->visible(fn ($record) => $record->status === 'pending'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRefundRequests::route('/'),
            'create' => Pages\CreateRefundRequest::route('/create'),
            'edit' => Pages\EditRefundRequest::route('/{record}/edit'),
        ];
    }
}
