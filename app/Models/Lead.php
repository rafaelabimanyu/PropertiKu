<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    protected $fillable = [
        'agent_id', 'user_id', 'property_id',
        'name', 'email', 'phone', 'source',
        'status', 'notes',
    ];

    public function agent(): BelongsTo { return $this->belongsTo(User::class, 'agent_id'); }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function property(): BelongsTo { return $this->belongsTo(Property::class); }
}
