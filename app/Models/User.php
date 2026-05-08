<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name', 'email', 'password', 'role', 'is_verified', 'company_name', 'phone', 'license_number', 'verification_status', 'verification_notes'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_BUYER = 'buyer';
    public const ROLE_AGENT = 'agent';
    public const ROLE_ADMIN = 'admin';

    public function isAdmin(): bool { return $this->role === self::ROLE_ADMIN; }
    public function isAgent(): bool { return $this->role === self::ROLE_AGENT; }
    public function isBuyer(): bool { return $this->role === self::ROLE_BUYER; }

    public function isVerified(): bool { return $this->is_verified; }
    public function isPendingVerification(): bool { return $this->verification_status === 'pending'; }

    public function properties(): HasMany { return $this->hasMany(Property::class); }
    public function favorites(): BelongsToMany { return $this->belongsToMany(Property::class, 'favorites')->withTimestamps(); }
    public function bookingsAsBuyer(): HasMany { return $this->hasMany(Booking::class, 'buyer_id'); }
    public function bookingsAsAgent(): HasMany { return $this->hasMany(Booking::class, 'agent_id'); }
    public function sentMessages(): HasMany { return $this->hasMany(Message::class, 'sender_id'); }
    public function receivedMessages(): HasMany { return $this->hasMany(Message::class, 'receiver_id'); }
    public function appNotifications(): HasMany { return $this->hasMany(AppNotification::class); }

    public function unreadNotificationsCount(): int
    {
        return $this->appNotifications()->where('is_read', false)->count();
    }

    public function unreadMessagesCount(): int
    {
        return $this->receivedMessages()->where('is_read', false)->count();
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
