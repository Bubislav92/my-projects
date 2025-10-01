<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'commentable_id',
        'commentable_type',
        'likes_count',
    ];

    protected $casts = [
        'likes_count' => 'integer',
    ];

    /**
     * Get the user that wrote the comment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the parent model that the comment belongs to (Post, another Comment, etc.).
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}