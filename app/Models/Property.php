<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'title', 'slug', 'price', 'city', 'address', 'bedrooms', 'bathrooms', 'area', 'status', 'description', 'image', 'latitude', 'longitude', 'facilities', 'images'])]
class Property extends Model
{
    protected function casts(): array
    {
        return [
            'facilities' => 'array',
            'images' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
