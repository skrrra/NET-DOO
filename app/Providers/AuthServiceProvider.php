<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        // PRODUCT GATES START

        Gate::define('create-product', function (User $user){
            return $user->role_id === 2 || $user->role_id === 1;
        });

        Gate::define('edit-product', function(User $user){
            return $user->role_id === 2 || $user->role_id === 1;
        });

        Gate::define('delete-product', function(User $user){
            return $user->role_id === 2;
        });

        // PRODUCT GATES END

        // CATEGORY GATES START

        Gate::define('create-category', function(User $user){
            return $user->role_id === 2 || $user->role_id === 1;
        });

        Gate::define('edit-category', function(User $user){
            return $user->role_id === 2 || $user->role_id === 1;
        });

        Gate::define('delete-category', function(User $user){
            return $user->role_id === 2;
        });

        // CATEGORY GATES END

    }
}
