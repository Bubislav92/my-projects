<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        
        // НОВИ ПРОФИЛНИ ПОДАЦИ (из миграције)
        'headline',
        'bio',
        'location',
        'avatar',
        'background_image',
        'website_url',
        'linkedin_url',
        
        // ПОДЕШАВАЊА И УПРАВЉАЊЕ
        'role',
        'is_active',
        'profile_views',
        'last_login_at',

        // ПРИВАТНОСТ И КОНТАКТ
        'is_public',
        'contact_privacy',
        'phone',
        'birth_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
            
            // НОВИ CASTS
            'birth_date' => 'date',
            'last_login_at' => 'datetime',
            'is_active' => 'boolean',
            'is_public' => 'boolean',
            'profile_views' => 'integer',
            // 'role' и 'contact_privacy' су enum, које Laravel аутоматски третира као string, 
            // али можете користити и Enum Casts ако дефинишете PHP Enums (што тренутно прескачемо).
        ];
    }
}