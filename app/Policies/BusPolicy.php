<?php

namespace App\Policies;

use App\Models\Bus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bus  $bus
     * @return mixed
     */
    public function isowner(User $user, Bus $bus)
    {
        return $bus->user()->is($user);
    }

    public function use(){
        return true;
    }
}
