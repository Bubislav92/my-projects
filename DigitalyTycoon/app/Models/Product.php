<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; 

class Product extends Model
{
    use HasFactory, HasTranslations; // <--- TRAIT ZA PREVODE

    /**
     * Polja koja su translatable (JSON kolone u bazi).
     *
     * @var array
     */
    public array $translatable = [
        'name',
        'short_description',
        'description',
    ];

    /**
     * Polja koja su dozvoljena za masovno dodeljivanje (Mass Assignment).
     *
     * @var array
     */
    protected $fillable = [
        // Prevodiva
        'name', 'short_description', 'description', 
        
        // Neprevodiva
        'price', 'slug', 'discount_price', 'image_url', 'demo_url', 'download_path', 
        'technologies', 'is_published', 'sort_order',
    ];
    
    /**
     * Kasting atributa.
     *
     * @var array
     */
    protected $casts = [
        'is_published' => 'boolean',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
    ];
    
    /**
     * Koristi slug umesto ID-a u URL rutama.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}