<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia; // <-- DODAJ OVU LINIJU
use Spatie\MediaLibrary\InteractsWithMedia; // <-- DODAJ OVU LINIJU
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Cviebrock\EloquentSluggable\Sluggable; // <-- DODAJ OVU LINIJU

class BlogPost extends Model implements HasMedia // Implementira HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable; // Koristi InteractsWithMedia i Sluggable

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'is_featured',
        'is_published',
        'published_at',
        // 'user_id', // Ako si dodao user_id u migraciju
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title' // Slug će se generisati iz 'title' polja
            ]
        ];
    }

    /**
     * Registruje konverzije medija za blog postove.
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(300)
            ->sharpen(10);

        $this->addMediaConversion('featured') // Konverzija za istaknute postove
            ->width(800)
            ->height(600)
            ->fit('crop', 800, 600);

        $this->addMediaConversion('full') // Konverzija za prikaz unutar posta
            ->width(1200)
            ->height(800)
            ->fit('crop', 1200, 800);
    }

    /**
     * Registruje kolekcije medija za blog postove.
     */
    public function registerMediaCollections(): void
    {
        // Glavna slika posta (thumbnail za listu, featured slika)
        $this->addMediaCollection('post_thumbnail')->singleFile();
        // Galerija slika unutar posta (opciono, ako želiš više slika u sadržaju)
        // $this->addMediaCollection('post_gallery');
    }

    // Opciono: Relacija sa korisnikom koji je napisao post
    /*
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    */
}