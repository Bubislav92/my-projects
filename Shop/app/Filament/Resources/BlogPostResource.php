<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor; // Za bogati tekstualni editor
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload; // Za upload slika
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn; // Za prikaz slika u tabeli
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str; // Za generisanje sluga

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text'; // Ikona za blog postove
    protected static ?string $navigationGroup = 'Blog Management'; // Nova grupa za blog
    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Blog Post';
    protected static ?string $pluralModelLabel = 'Blog Posts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Post Details')
                    ->description('Basic information about the blog post.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true) // Ažurira slug dok kucaš
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null), // Generiše slug pri kreiranju

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true), // Jedinstven slug, ignorisanje trenutnog posta pri izmeni

                        SpatieMediaLibraryFileUpload::make('post_thumbnail') // Kolekcija 'post_thumbnail'
                            ->label('Featured Image')
                            ->collection('post_thumbnail') // Mora se poklapati sa kolekcijom u modelu
                            ->image() // Samo slike
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']) // Dozvoljeni tipovi
                            ->imageEditor() // Omogućava Filamentov editor slika
                            ->directory('blog_posts') // Slike će ići u storage/app/public/blog_posts
                            ->helperText('Upload a single image for the blog post thumbnail.'),

                        Forms\Components\Textarea::make('excerpt') // Koristimo Textarea za excerpt
                            ->label('Excerpt')
                            ->rows(3)
                            ->maxLength(65535), // Dugačak tekst za excerpt

                        RichEditor::make('content') // Bogati tekstualni editor
                            ->label('Content')
                            ->required()
                            ->fileAttachmentsDirectory('blog_attachments') // Fajlovi iz editora idu ovde
                            ->fileAttachmentsVisibility('public') // Vidljivi javno
                            ->toolbarButtons([ // Dugmad u editoru
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                            ->columnSpanFull(), // Zauzima celu širinu
                    ])->columns(2),

                Section::make('Publishing & Visibility')
                    ->description('Control the post\'s visibility and publication status.')
                    ->schema([
                        Toggle::make('is_featured')
                            ->label('Featured Post')
                            ->helperText('Mark this post as featured to display it prominently.'),

                        Toggle::make('is_published')
                            ->label('Published')
                            ->helperText('Toggle to make the post visible on the blog page.'),

                        DatePicker::make('published_at')
                            ->label('Published At')
                            ->default(now()) // Podrazumevano današnji datum
                            ->native(false) // Lepši prikaz
                            ->required(fn (Forms\Get $get) => $get('is_published')), // Obavezno ako je objavljen
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('post_thumbnail') // Prikaz slike u tabeli
                    ->label('Thumbnail')
                    ->collection('post_thumbnail')
                    ->conversion('thumb'), // Koristi 'thumb' konverziju

                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),

                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                TextColumn::make('published_at')
                    ->label('Published At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured Posts')
                    ->boolean(),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published Posts')
                    ->boolean(),
                Tables\Filters\Filter::make('published_at')
                    ->form([
                        Forms\Components\DatePicker::make('published_from'),
                        Forms\Components\DatePicker::make('published_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '>=', $date),
                            )
                            ->when(
                                $data['published_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Možeš dodati relation manager za komentare ako ih budeš imao
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'excerpt'];
    }

    // Opciono: Kontrola pristupa resursu (npr. samo admin može da ga vidi)
    public static function canViewAny(): bool
    {
        // Ako je samo admin u Filamentu, onda je ovo ok.
        return true;
    }
}