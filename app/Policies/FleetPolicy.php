<?php

namespace App\Policies;

use App\Models\Fleet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FleetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Fleet  $fleet
     * @return mixed
     */
    public function view(User $user, Fleet $fleet)
    {
        return $fleet->user()->is($user);
    }


}
