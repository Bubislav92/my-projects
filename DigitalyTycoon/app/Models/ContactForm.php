<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'company_name',
        'email',
        'phone',
        'project_type',
        'budget',
        'message',
    ];

    protected $table = 'contact_forms';
}
