<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

  protected $fillable = [
      'user_id',
      'payer_name',
      'payer_email',
      'payment_id',
      'capture_id',
      'amount',
      'currency',
      'status',
      'payment_method',
      'product_name',
  ];

  protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function refundRequests()
    {
        return $this->hasMany(RefundRequest::class);
    }

    public function logs()
    {
        return $this->hasMany(PaymentLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
