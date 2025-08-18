<?php

namespace App\Filament\Resources;

use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\AboutPostResource\Pages;
use App\Filament\Resources\AboutPostResource\RelationManagers;
use App\Models\AboutPost;
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

class AboutPostResource extends Resource
{

    use Translatable;

    protected static ?string $model = AboutPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('header_text'),
                MarkdownEditor::make('header_description'),
                FileUpload::make('header_image')
                    ->image(),
                MarkdownEditor::make('section_text'),
                TextInput::make('menu_first_title'),
                TextInput::make('menu_second_title'),
                TextInput::make('menu_third_title'),
                TextInput::make('menu_fourth_title'),
                TextInput::make('menu_first_subtitle'),
                TextInput::make('menu_second_subtitle'),
                TextInput::make('menu_third_subtitle'),
                TextInput::make('menu_fourth_subtitle'),
                MarkdownEditor::make('menu_first_description'),
                MarkdownEditor::make('menu_second_description'),
                MarkdownEditor::make('menu_third_description'),
                MarkdownEditor::make('menu_fourth_description'),
                FileUpload::make('menu_first_image')
                    ->image(),
                FileUpload::make('menu_second_image')
                    ->image(),
                FileUpload::make('menu_third_image')
                    ->image(),
                FileUpload::make('menu_fourth_image')
                    ->image(),
                TextInput::make('home'),
                TextInput::make('about_us'),
                TextInput::make('faqs'),
                TextInput::make('contact'),
                TextInput::make('firstname'),
                TextInput::make('lastname'),
                TextInput::make('email'),
                TextInput::make('message'),
                TextInput::make('send_message'),
                TextInput::make('button_first'),
                TextInput::make('button_second'),
                TextInput::make('header_text_item_first'),
                TextInput::make('header_text_item_second'),
                TextInput::make('section_heading_title_first'),
                TextInput::make('section_heading_title_second'),
                TextInput::make('section_heading_description'),
                TextInput::make('skill_first'),
                TextInput::make('skill_second'),
                TextInput::make('skill_third'),
                TextInput::make('step_first'),
                TextInput::make('step_second'),
                TextInput::make('step_third'),
                TextInput::make('cta_section_item_first'),
                TextInput::make('cta_section_item_second'),
                TextInput::make('cta_section_item_third'),
                TextInput::make('cta_section_item_fourth'),
                TextInput::make('cta_section_contact_item_first'),
                TextInput::make('cta_section_contact_item_second'),
                TextInput::make('cta_section_contact_item_third'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('header_text'),
                TextColumn::make('header_description'),
                ImageColumn::make('header_image'),
                TextColumn::make('section_text'),
                TextColumn::make('menu_first_title'),
                TextColumn::make('menu_second_title'),
                TextColumn::make('menu_third_title'),
                TextColumn::make('menu_fourth_title'),
                TextColumn::make('menu_first_subtitle'),
                TextColumn::make('menu_second_subtitle'),
                TextColumn::make('menu_third_subtitle'),
                TextColumn::make('menu_fourth_subtitle'),
                TextColumn::make('menu_first_description'),
                TextColumn::make('menu_second_description'),
                TextColumn::make('menu_third_description'),
                TextColumn::make('menu_fourth_description'),
                ImageColumn::make('menu_first_image'),
                ImageColumn::make('menu_second_image'),
                ImageColumn::make('menu_third_image'),
                ImageColumn::make('menu_fourth_image'),
                TextColumn::make('home'),
                TextColumn::make('about_us'),
                TextColumn::make('faqs'),
                TextColumn::make('contact'),
                TextColumn::make('firstname'),
                TextColumn::make('lastname'),
                TextColumn::make('email'),
                TextColumn::make('message'),
                TextColumn::make('send_message'),
                TextColumn::make('button_first'),
                TextColumn::make('button_second'),
                TextColumn::make('header_text_item_first'),
                TextColumn::make('header_text_item_second'),
                TextColumn::make('section_heading_title_first'),
                TextColumn::make('section_heading_title_second'),
                TextColumn::make('section_heading_description'),
                TextColumn::make('skill_first'),
                TextColumn::make('skill_second'),
                TextColumn::make('skill_third'),
                TextColumn::make('step_first'),
                TextColumn::make('step_second'),
                TextColumn::make('step_third'),
                TextColumn::make('cta_section_item_first'),
                TextColumn::make('cta_section_item_second'),
                TextColumn::make('cta_section_item_third'),
                TextColumn::make('cta_section_item_fourth'),
                TextColumn::make('cta_section_contact_item_first'),
                TextColumn::make('cta_section_contact_item_second'),
                TextColumn::make('cta_section_contact_item_third'),
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
            'index' => Pages\ListAboutPosts::route('/'),
            'create' => Pages\CreateAboutPost::route('/create'),
            'edit' => Pages\EditAboutPost::route('/{record}/edit'),
        ];
    }
}
