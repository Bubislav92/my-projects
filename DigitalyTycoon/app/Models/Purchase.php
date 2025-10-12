<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'product_id',
        'product_name',
        'amount',
        'currency',
        'payment_method',
        'payment_status',
        'payment_id',
        'download_path',
    ];

    public function template()
    {
        return $this->belongsTo(Product::class);
    }
}
