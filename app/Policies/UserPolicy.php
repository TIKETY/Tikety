<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function create_bus(User $user)
    {
        return !$user->user_has_bus();
    }

    public function edit_profile(User $user){
        return $user->is(auth()->user());
    }
}
