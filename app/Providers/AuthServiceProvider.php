<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\ProductPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Product::class => ProductPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('update-product', function ($user, $product){
            return $user->id == $product->user_id;
         });
        Gate::define('delete-product', function ($user, $product){
            if($user->id == $product->user_id||$user->role == User::ADMIN){
                return true;
            }else{
                return false;
            }
         });
    }
}
