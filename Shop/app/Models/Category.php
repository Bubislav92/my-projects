<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia; // Dodato za Spatie
use Spatie\MediaLibrary\InteractsWithMedia; // Dodato za Spatie
use Spatie\MediaLibrary\MediaCollections\Models\Media; // Dodato za Media konverzije

class Category extends Model implements HasMedia // Bitno: implementira HasMedia interfejs
{
    use HasFactory, InteractsWithMedia; // Bitno: koristi InteractsWithMedia trait

    protected $fillable = [
        'name',
        'slug',
        'is_active',
        // Ne treba 'image' kolona u bazi ako koristiš Spatie Media Library
        // Spatie skladišti informacije o medijima u svojoj 'media' tabeli
    ];

    /**
     * Definiše relaciju sa proizvodima.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Registruje konverzije medija (različite veličine slika).
     * Ove konverzije će se generisati za svaku sliku dodatu u kolekciju 'category_images'.
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        // Konverzija za malu sličicu (thumbnail)
        $this->addMediaConversion('thumb')
            ->width(120)
            ->height(120)
            ->sharpen(10); // Opciono: pooštravanje slike

        // Konverzija za pregled veće slike
        $this->addMediaConversion('preview')
            ->width(800)
            ->height(600)
            ->fit('crop', 800, 600); // Osigurava da slika popuni dimenzije
    }

    /**
     * Registruje kolekcije medija.
     * Ovde definišemo kolekciju za slike kategorija.
     */
    public function registerMediaCollections(): void
    {
        // Definiše kolekciju 'category_images'.
        // Metoda `singleFile()` je ključna: dozvoljava samo jednu sliku po kategoriji.
        $this->addMediaCollection('category_images')->singleFile();
    }

    // Nema potrebe za getImageUrlAttribute, Spatie već ima getFirstMediaUrl()
    // Ali, ako baš želiš da zadržiš accessor za Blade čitljivost, možeš:
    public function getImageUrlAttribute(): ?string
    {
        // Vraća URL do 'thumb' konverzije (ili originala ako 'thumb' ne postoji/nije generisan)
        return $this->getFirstMediaUrl('category_images', 'thumb');
    }
}