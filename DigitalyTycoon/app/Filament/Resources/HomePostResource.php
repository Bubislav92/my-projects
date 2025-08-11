<?php

namespace App\Filament\Resources;

use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\HomePostResource\Pages;
use App\Filament\Resources\HomePostResource\RelationManagers;
use App\Models\HomePost;
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

class HomePostResource extends Resource
{

    use Translatable;

    protected static ?string $model = HomePost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('header_title'),

                TextInput::make('home'),
                TextInput::make('services'),
                TextInput::make('projects'),
                TextInput::make('infos'),
                TextInput::make('contact'),
                TextInput::make('about_us'),
                TextInput::make('faqs'),

                TextInput::make('banner_title'),
                TextInput::make('banner_subtitle'),
                TextInput::make('banner_text_item_first'),
                TextInput::make('banner_text_item_second'),
                TextInput::make('banner_text_item_third'),
                TextInput::make('banner_text_item_fourth'),
                MarkdownEditor::make('banner_description'),

                TextInput::make('button_first'),
                TextInput::make('button_second'),

                TextInput::make('service_title_first'),
                TextInput::make('service_title_second'),
                TextInput::make('service_title_third'),
                TextInput::make('service_title_fourth'),
                MarkdownEditor::make('service_description'),
                TextInput::make('service_item_first'),
                TextInput::make('service_item_second'),
                TextInput::make('service_item_third'),
                TextInput::make('service_item_fourth'),

                TextInput::make('project_title_first'),
                TextInput::make('project_title_second'),
                TextInput::make('project_title_third'),
                MarkdownEditor::make('project_description'),
                TextInput::make('project_subtitle_first'),
                TextInput::make('project_subtitle_second'),
                TextInput::make('project_subtitle_third'),
                TextInput::make('project_subtitle_fourth'),
                TextInput::make('project_subtitle_fifth'),
                TextInput::make('project_subtitle_sixth'),

                TextInput::make('info_title_first'),
                TextInput::make('info_title_second'),
                TextInput::make('info_title_third'),
                TextInput::make('info_title_fourth'),
                MarkdownEditor::make('info_description_first'),
                MarkdownEditor::make('info_description_second'),

                TextInput::make('skill_step_first'),
                TextInput::make('skill_step_second'),
                TextInput::make('skill_step_third'),

                TextInput::make('cta_section_item_first'),
                TextInput::make('cta_section_item_second'),
                TextInput::make('cta_section_item_third'),
                TextInput::make('cta_section_contact_item_first'),
                TextInput::make('cta_section_contact_item_second'),
                TextInput::make('cta_section_contact_item_third'),

                TextInput::make('firstname'),
                TextInput::make('lastname'),
                TextInput::make('email'),
                TextInput::make('subject'),
                TextInput::make('message'),
                TextInput::make('send_message'),

                FileUpload::make('project_image_first')
                    ->image(),
                FileUpload::make('project_image_second')
                    ->image(),
                FileUpload::make('project_image_third')
                    ->image(),
                FileUpload::make('project_image_fourth')
                    ->image(),
                FileUpload::make('project_image_fifth')
                    ->image(),
                FileUpload::make('project_image_sixth')
                    ->image(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('header_title'),

                TextColumn::make('home'),
                TextColumn::make('services'),
                TextColumn::make('projects'),
                TextColumn::make('infos'),
                TextColumn::make('contact'),
                TextColumn::make('about_us'),
                TextColumn::make('faqs'),

                TextColumn::make('banner_title'),
                TextColumn::make('banner_subtitle'),
                TextColumn::make('banner_text_item_first'),
                TextColumn::make('banner_text_item_second'),
                TextColumn::make('banner_text_item_third'),
                TextColumn::make('banner_text_item_fourth'),
                TextColumn::make('banner_description'),

                TextColumn::make('button_first'),
                TextColumn::make('button_second'),

                TextColumn::make('service_title_first'),
                TextColumn::make('service_title_second'),
                TextColumn::make('service_title_third'),
                TextColumn::make('service_title_fourth'),
                TextColumn::make('service_description'),
                TextColumn::make('service_item_first'),
                TextColumn::make('service_item_second'),
                TextColumn::make('service_item_third'),
                TextColumn::make('service_item_fourth'),

                TextColumn::make('project_title_first'),
                TextColumn::make('project_title_second'),
                TextColumn::make('project_title_third'),
                TextColumn::make('project_description'),
                TextColumn::make('project_subtitle_first'),
                TextColumn::make('project_subtitle_second'),
                TextColumn::make('project_subtitle_third'),
                TextColumn::make('project_subtitle_fourth'),
                TextColumn::make('project_subtitle_fifth'),
                TextColumn::make('project_subtitle_sixth'),

                TextColumn::make('info_title_first'),
                TextColumn::make('info_title_second'),
                TextColumn::make('info_title_third'),
                TextColumn::make('info_title_fourth'),
                TextColumn::make('info_description_first'),
                TextColumn::make('info_description_second'),

                TextColumn::make('skill_step_first'),
                TextColumn::make('skill_step_second'),
                TextColumn::make('skill_step_third'),

                TextColumn::make('cta_section_item_first'),
                TextColumn::make('cta_section_item_second'),
                TextColumn::make('cta_section_item_third'),
                TextColumn::make('cta_section_contact_item_first'),
                TextColumn::make('cta_section_contact_item_second'),
                TextColumn::make('cta_section_contact_item_third'),

                TextColumn::make('firstname'),
                TextColumn::make('lastname'),
                TextColumn::make('email'),
                TextColumn::make('subject'),
                TextColumn::make('message'),
                TextColumn::make('send_message'),
                
                ImageColumn::make('project_image_first'),
                ImageColumn::make('project_image_second'),
                ImageColumn::make('project_image_third'),
                ImageColumn::make('project_image_fourth'),
                ImageColumn::make('project_image_fifth'),
                ImageColumn::make('project_image_sixth'),

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
            'index' => Pages\ListHomePosts::route('/'),
            'create' => Pages\CreateHomePost::route('/create'),
            'edit' => Pages\EditHomePost::route('/{record}/edit'),
        ];
    }
}
