<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PropertyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Property $property): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isAgent() || $user->isAdmin();
    }

    public function update(User $user, Property $property): bool
    {
        return $user->isAdmin() || ($user->isAgent() && $user->id === $property->user_id);
    }

    public function delete(User $user, Property $property): bool
    {
        return $user->isAdmin() || ($user->isAgent() && $user->id === $property->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Property $property): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Property $property): bool
    {
        return false;
    }
}
