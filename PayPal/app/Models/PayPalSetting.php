<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayPalSetting extends Model
{

  protected $fillable = [
      'sandbox_client_id',
      'sandbox_secret',
      'live_client_id',
      'live_secret',
      'mode',
  ];

  
  
}
