<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLinks extends Model
{
    protected $fillable = [
        'facebook',
        'twitter',
        'tiktok',
        'instagram',
        'linkedin',
        'google_plus',
    ];
}
