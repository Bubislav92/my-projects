<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\ProductReview;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'discount_price',
        'quantity',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relacije (Relationships)
    |--------------------------------------------------------------------------
    */

    /**
     * Get the category that owns the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the cart items for the product.
     */
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Get the order items for the product.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    /**
     * Registruje medijske konverzije.
     * Ovde definišeš sve verzije slika koje želiš da generišeš automatski.
     */
    public function registerMediaConversions(Media $media = null): void
    {
        // Konverzija za thumbnail na listi proizvoda/kategorija (npr. 400x400)
        $this->addMediaConversion('thumb')
             ->width(400)
             ->height(400)
             ->sharpen(10) // Opciono: malo izoštravanje
             ->nonQueued(); // Konvertuje odmah (za manje sajtove) ili ukloni za red čekanja

        // Konverzija za glavnu sliku na stranici detalja proizvoda (npr. 800x800)
        $this->addMediaConversion('medium')
             ->width(800)
             ->height(800)
             ->sharpen(10)
             ->nonQueued();

        // Konverzija za veliku sliku/zoom (npr. 1200x1200)
        $this->addMediaConversion('large')
             ->width(1200)
             ->height(1200)
             ->sharpen(10)
             ->nonQueued();

        // Možeš dodati i responzivne konverzije ako želiš, koristeći responsiveImages()
        // $this->addMediaConversion('responsive')
        //      ->withResponsiveImages();
    }

    /**
     * Registruje medijske kolekcije.
     * Ovde definišeš kolekcije slika (npr. "main_images", "gallery_images").
     */
    public function registerMediaCollections(): void
    {
        // Glavna kolekcija za slike proizvoda
        $this->addMediaCollection('product_images'); // Ovo je kolekcija koju koristimo u Filamentu
                                                    // i koja će sadržavati sve slike proizvoda
    }

    /**
     * Pomoćni accessor za dohvat glavne thumbnail slike.
     * Koristi se u Blade-u za prikaz thumbnaila na listama.
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        // Dohvata URL 'thumb' konverzije prve slike iz 'product_images' kolekcije
        return $this->getFirstMediaUrl('product_images', 'thumb');
    }

    /**
     * Pomoćni accessor za dohvat URL-a glavne slike.
     * Koristi se u Blade-u za prikaz na stranici detalja proizvoda.
     */
    public function getMediumImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('product_images', 'medium');
    }

    /**
     * Pomoćni accessor za dohvat URL-a velike slike.
     * Koristi se za zoom ili galeriju visokog kvaliteta.
     */
    public function getLargeImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('product_images', 'large');
    }
}
