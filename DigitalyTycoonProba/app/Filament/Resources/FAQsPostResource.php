<?php

namespace App\Filament\Resources;

use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\FAQsPostResource\Pages;
use App\Filament\Resources\FAQsPostResource\RelationManagers;
use App\Models\FAQsPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable as ConcernsTranslatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FAQsPostResource extends Resource
{

    use Translatable;

    protected static ?string $model = FAQsPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('home'),
                TextInput::make('infos'),
                TextInput::make('contact'),
                TextInput::make('about_us'),
                TextInput::make('faqs'),

                TextInput::make('step_title_first'),
                TextInput::make('step_title_second'),
                TextInput::make('step_title_third'),
                TextInput::make('step_title_fourth'),

                TextInput::make('step_item_first'),
                TextInput::make('step_item_second'),
                TextInput::make('step_item_third'),
                TextInput::make('step_item_fourth'),

                TextInput::make('faq_section_title'),
                TextInput::make('faq_section_description'), 

                TextInput::make('banner_title'),
                TextInput::make('banner_subtitle'),
                MarkdownEditor::make('banner_description'),

                TextInput::make('cta_section_item_first'),
                TextInput::make('cta_section_item_second'),
                TextInput::make('cta_section_item_third'),
                TextInput::make('cta_section_contact_item_first'),
                TextInput::make('cta_section_contact_item_second'),
                TextInput::make('cta_section_contact_item_third'),
                TextInput::make('cta_section_contact_item_fourth'),

                TextInput::make('header_title'),
                TextInput::make('question'),

                TextInput::make('firstname'),
                TextInput::make('lastname'),
                TextInput::make('email'),
                TextInput::make('subject'),
                TextInput::make('message'),
                TextInput::make('send_message'),

                FileUpload::make('logo_image')
                    ->image(),
                FileUpload::make('header_image')
                    ->image(),
                MarkdownEditor::make('answer'),
            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('home'),
                TextColumn::make('infos'),
                TextColumn::make('contact'),
                TextColumn::make('about_us'),
                TextColumn::make('faqs'),

                TextColumn::make('banner_title'),
                TextColumn::make('banner_subtitle'),
                TextColumn::make('banner_description'),

                TextColumn::make('step_title_first'),
                TextColumn::make('step_title_second'),
                TextColumn::make('step_title_third'),
                TextColumn::make('step_title_fourth'),

                TextColumn::make('step_item_first'),
                TextColumn::make('step_item_second'),
                TextColumn::make('step_item_third'),
                TextColumn::make('step_item_fourth'),

                TextColumn::make('faq_section_title'),
                TextColumn::make('faq_section_description'),

                TextColumn::make('firstname'),
                TextColumn::make('lastname'),
                TextColumn::make('email'),
                TextColumn::make('subject'),
                TextColumn::make('message'),
                TextColumn::make('send_message'),

                TextColumn::make('header_title'),
                TextColumn::make('question'),
                ImageColumn::make('logo_image'),
                ImageColumn::make('header_image'),
                TextColumn::make('answer'),

                TextColumn::make('cta_section_item_first'),
                TextColumn::make('cta_section_item_second'),
                TextColumn::make('cta_section_item_third'),
                TextColumn::make('cta_section_contact_item_first'),
                TextColumn::make('cta_section_contact_item_second'),
                TextColumn::make('cta_section_contact_item_third'),
                TextColumn::make('cta_section_contact_item_fourth'),
            
                ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFAQsPosts::route('/'),
            'create' => Pages\CreateFAQsPost::route('/create'),
            'edit' => Pages\EditFAQsPost::route('/{record}/edit'),
        ];
    }
}
