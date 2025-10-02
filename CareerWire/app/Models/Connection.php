<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User; // Обавезно да можемо да референцирамо User модел

class Connection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sender_id',
        'recipient_id',
        'status',
    ];

    // **********************************************
    //              ЕЛОКВЕНТ РЕЛАЦИЈЕ
    // **********************************************

    /**
     * Get the user who sent the connection request.
     * Однос: BelongsTo (Користи sender_id као страни кључ).
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Get the user who received the connection request.
     * Однос: BelongsTo (Користи recipient_id као страни кључ).
     */
    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

}