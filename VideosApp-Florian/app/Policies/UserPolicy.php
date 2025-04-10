<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view the model.
     */
    public function view(User $user, User $model)
    {
        return $user->id === $model->id || $user->super_admin;
    }

    /**
     * Determine if the given user can update the model.
     */
    public function update(User $user, User $model)
    {
        return $user->id === $model->id || $user->super_admin;
    }

}
