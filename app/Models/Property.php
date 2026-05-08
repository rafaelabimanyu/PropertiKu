<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'title', 'slug', 'price', 'city', 'address',
        'bedrooms', 'bathrooms', 'area', 'type', 'status', 'description',
        'image', 'latitude', 'longitude', 'facilities', 'images',
        'is_featured', 'listing_plan',
    ];

    protected function casts(): array
    {
        return [
            'facilities' => 'array',
            'images' => 'array',
            'is_featured' => 'boolean',
        ];
    }

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function bookings(): HasMany { return $this->hasMany(Booking::class); }
    public function favoritedBy(): BelongsToMany { return $this->belongsToMany(User::class, 'favorites')->withTimestamps(); }
    public function reviews(): HasMany { return $this->hasMany(Review::class); }

    public function averageRating(): float
    {
        return (float) $this->reviews()->avg('property_rating') ?: 0.0;
    }

    public function agentRating(): float
    {
        return (float) $this->reviews()->avg('agent_professionalism') ?: 0.0;
    }
}
