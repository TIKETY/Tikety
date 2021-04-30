<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use App\Policies\BusPolicy;
use App\Models\User;
use App\Policies\FleetPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Bus::class => BusPolicy::class,
        Fleet::class => FleetPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        Gate::after(function($user, $ability){
            return $user->abilities()->contains($ability);
        });

        Gate::define('is_owner', function (User $user) {
            if(!is_null($user->phone_verified_at)){
            return $user->phone_number === '+255654660654';
            }
        });

        Gate::define('is_user_blocked', function (User $user) {
            return !is_null($user->blocked_at);
        });

        Gate::define('is_user_deleted', function (User $user) {
            return !is_null($user->deleted_at);
        });
    }
}
