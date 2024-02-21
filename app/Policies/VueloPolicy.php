<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vuelo;
use Illuminate\Auth\Access\Response;

class VueloPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vuelo $vuelo): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user != null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vuelo $vuelo): bool
    {
        return $vuelo->user == $user;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vuelo $vuelo): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vuelo $vuelo): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vuelo $vuelo): bool
    {
        return false;
    }
}
