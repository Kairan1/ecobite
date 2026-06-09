<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SurplusItem extends Model
{
    protected $fillable = [
        'vendor_id',
        'food_name',
        'image',
        'original_price',
        'discounted_price',
        'quantity',
        'status'
    ];

    /**
     * Get the vendor that owns the surplus item.
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
}
