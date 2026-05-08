<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'property_id', 'buyer_id', 'agent_id',
        'survey_date', 'survey_time', 'notes', 'status',
    ];

    protected function casts(): array
    {
        return ['survey_date' => 'date'];
    }

    public function property(): BelongsTo { return $this->belongsTo(Property::class); }
    public function buyer(): BelongsTo { return $this->belongsTo(User::class, 'buyer_id'); }
    public function agent(): BelongsTo { return $this->belongsTo(User::class, 'agent_id'); }
}
