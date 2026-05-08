<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    protected $fillable = [
        'user_id', 'title', 'slug', 'price', 'city', 'address',
        'bedrooms', 'bathrooms', 'area', 'status', 'description',
        'image', 'latitude', 'longitude', 'facilities', 'images',
    ];

    protected function casts(): array
    {
        return [
            'facilities' => 'array',
            'images' => 'array',
        ];
    }

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function bookings(): HasMany { return $this->hasMany(Booking::class); }
    public function favoritedBy(): BelongsToMany { return $this->belongsToMany(User::class, 'favorites')->withTimestamps(); }
}
