<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne; // Potrebno za tipovanje relacije
use Illuminate\Database\Eloquent\Relations\HasMany;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use App\Models\ProductReview;


class User extends Authenticatable implements FilamentUser
{

    /**
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
    */
    /**
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @mixin \Illuminate\Foundation\Auth\User
 * @mixin \Illuminate\Notifications\Notifiable
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Wishlist> $wishlistItems
 * @property-read \App\Models\Cart|null $cart
 */

    use HasFactory, Notifiable;

    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';

    protected $fillable = [
        'name', // Ako koristite samo 'name' za puno ime
        'email',
        'password',
        'phone',
        'address_line_1', // Dodato (ako je to naziv kolone u bazi)
        'address_line_2', // Dodato (ako je to naziv kolone u bazi)
        'city',
        'state',          // Dodato (ako je to naziv kolone u bazi)
        'zip_code',       // Dodato (ako je to naziv kolone u bazi)
        'country',        // Dodato (ako je to naziv kolone u bazi)
        'date_of_birth',
        'status',
        'role',           // Dodajte 'role' ako ga koristite za isAdmin/isUser
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relacije (Relationships)
    |--------------------------------------------------------------------------
    */

    /**
     * Get the cart associated with the user.
     */
    public function cart(): HasOne // <--- Ime metode je 'cart()' sa malim 'c'
    {
        return $this->hasOne(Cart::class);
    }

    /**
     * Get the orders for the user. (Ako je relacija aktivna)
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    


    public function wishlistItems(): HasMany
    {
        return $this->hasMany(WishList::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Metodi za uloge
    |--------------------------------------------------------------------------
    */
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isUser(): bool
    {
        return $this->role === self::ROLE_USER;
    }

    /*
    |--------------------------------------------------------------------------
    | Filament metode
    |--------------------------------------------------------------------------
    */
    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->isAdmin();
        }
        return false;
    }
}