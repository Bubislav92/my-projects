<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContactFormTranslation extends Model
{
    use HasTranslations;

    protected $fillable = [
        'first_name', 
        'last_name',
        'email',
        'subject',
        'message',
        'send_message',
        ];

    public array $translatable = 
    [
        'first_name', 
        'last_name',
        'email',
        'subject',
        'message',
        'send_message',
    ];

    protected $casts = [
        'first_name', 
        'last_name',
        'email',
        'subject',
        'message',
        'send_message',
    ];
}
