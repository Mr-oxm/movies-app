<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts   = ['release_date' => 'datetime'];

    /**
     * Get the user that owns the Movie.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}