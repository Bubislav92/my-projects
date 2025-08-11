<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{

  protected $fillable = [
      'payment_id',
      'user_id',
      'capture_id',
      'product_name',
      'amount',
      'currency',
      'status',
      'event',
      'payload',
  ];

  protected $casts = [
      'payload' => 'array',
  ];

  public function payment()
  {
      return $this->belongsTo(Payment::class);
  }

  public function user()
  {
        return $this->belongsTo(User::class);
  }
  
}
