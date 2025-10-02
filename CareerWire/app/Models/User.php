<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasManyThrough; // Може за будућност
use Illuminate\Database\Eloquent\Relations\MorphMany; // За лајкове и коментаре
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    // 1. РЕЛАЦИЈЕ ЗА ПРОФИЛ И САДРЖАЈ
    
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
    
    public function jobListings(): HasMany
    {
        return $this->hasMany(UserJob::class);
    }
    
    // 2. РЕЛАЦИЈЕ ЗА ИНТЕРАКЦИЈЕ
    
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    // 3. РЕЛАЦИЈЕ ЗА МРЕЖУ

    public function sentConnections(): HasMany
    {
        return $this->hasMany(Connection::class, 'sender_id');
    }

    public function receivedConnections(): HasMany
    {
        return $this->hasMany(Connection::class, 'recipient_id');
    }
    
    // ************************************************************
    // ПОМОЋНА РЕЛАЦИЈА (ЗА ЛОГИКУ МРЕЖЕ - АКТИВНЕ ВЕЗЕ)
    // ************************************************************
    
    /**
     * Преузима све активне везе (Connections) корисника.
     * Ово је комплекснија функција за добијање листе свих ПРИХВАЋЕНИХ пријатеља.
     */
    public function getConnections()
    {
        // Враћа ID-је корисника са којима је тренутни корисник повезан
        $sentAccepted = $this->sentConnections()->where('status', 'accepted')->pluck('recipient_id');
        $receivedAccepted = $this->receivedConnections()->where('status', 'accepted')->pluck('sender_id');

        $connectedIds = $sentAccepted->merge($receivedAccepted)->unique();

        return User::whereIn('id', $connectedIds);
    }
    
}