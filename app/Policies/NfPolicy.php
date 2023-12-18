<?php

namespace App\Policies;

use App\Models\Nf;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NfPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Nf $nf): bool
    {
        return $user->id === $nf->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Nf $nf): bool
    {
        return $user->id === $nf->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Nf $nf): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Nf $nf): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Nf $nf): bool
    {
        //
    }
}
