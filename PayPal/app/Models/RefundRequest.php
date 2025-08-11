<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefundRequest extends Model
{

  protected $fillable = [
      'user_id',
      'payment_id',
      'capture_id',
      'refund_id',
      'status',
      'reason',
      'refunded_at',
  ];

  protected $casts = [
      'refunded_at' => 'datetime',
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
