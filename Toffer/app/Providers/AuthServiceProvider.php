<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // $roles = Role::all();

        // foreach ($roles as $role) {
        //     Gate::define($role->title,function(User $user) use ($role){
        //         return $user->hasRole($role);
        //     });
        // }

        $roles = ["cliente","administrador"];
        foreach ($roles as $role) {
            Gate::define($role,function(User $user) use ($role){
                return $user->role($role);
            });
        }


        Gate::before(function ($user, $ability) {
            if ($user->role == "Webmaster") {
                return true;
            }
        });
    }
}
