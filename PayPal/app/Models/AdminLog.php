<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    protected $fillable = [
        'refund_request_id',
        'admin_id',
        'action',
    ];

    public function refundRequest()
    {
        return $this->belongsTo(refundRequest::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
