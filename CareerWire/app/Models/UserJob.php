<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserJob extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_jobs'; // Дефинисано име табеле

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'salary_min',
        'salary_max',
        'employment_type',
        'experience_level',
        'application_link',
        'application_email',
        'expires_at',
        'is_active',
        'views_count',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
        'views_count' => 'integer',
    ];

    /**
     * Get the user (employer) that posted the job.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}