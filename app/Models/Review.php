<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'property_id', 'agent_id',
        'property_rating', 'agent_professionalism', 'agent_responsiveness',
        'comment',
    ];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function property(): BelongsTo { return $this->belongsTo(Property::class); }
    public function agent(): BelongsTo { return $this->belongsTo(User::class, 'agent_id'); }
}
