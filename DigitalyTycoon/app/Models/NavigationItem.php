<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class NavigationItem extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'navigation_items';

    protected $fillable = [
        'name',
        'slug',
        'order',
    ];

    public $translatable = [
        'name',
    ];

    protected $casts = [
        'name' => 'array',
    ];
}