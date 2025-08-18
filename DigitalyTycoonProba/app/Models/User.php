<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Define whether the user can access a specific Filament panel.
     *
     * @param string $panel
     * @return bool
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Ova metoda se poziva svaki put kada se pokuša pristupiti Filament panelu.
        // Morate vratiti 'true' da biste omogućili pristup.

        // Za početnu fazu razvoja i otklanjanje grešaka, jednostavno vratite true.
        // Ovo će omogućiti BILO KOM prijavljenom korisniku da pristupi admin panelu.
        return true; 
        
        // Kasnije, kada budete želeli da implementirate granularniju kontrolu,
        // možete dodati logiku ovde, na primer:
        // return $this->is_admin; // Ako imate kolonu 'is_admin' u tabeli 'users'
        // return in_array($this->email, ['admin@example.com']); // Za pristup samo određenim emailovima
    }
}