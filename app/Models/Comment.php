<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Comment model
 */
class Comment extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'comments';
    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Represents an input date to the carbon object
     *
     * @return Carbon
     */
    public function getCarbonDateAttribute(): Carbon
    {
        return Carbon::parse($this->created_at);
    }
}
