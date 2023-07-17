<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        Gate::define('User.index',function($user){
            return(in_array('User.index',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('User.create',function($user){
            return(in_array('User.create',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('User.Update',function($user){
            return(in_array('User.Update',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('User.delete',function($user){
            return(in_array('User.delete',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('User.restore',function($user){
            return(in_array('User.restore',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('User.forceDelete',function($user){
            return(in_array('User.forceDelete',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Employee.index',function($user){
            return(in_array('Employee.index',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Employee.create',function($user){
            return(in_array('Employee.create',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Employee.Update',function($user){
            return(in_array('Employee.Update',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Employee.delete',function($user){
            return(in_array('Employee.delete',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Employee.restore',function($user){
            return(in_array('Employee.restore',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Employee.forceDelete',function($user){
            return(in_array('Employee.forceDelete',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.index',function($user){
            return(in_array('Restaurant.index',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.create',function($user){
            return(in_array('Restaurant.create',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.Update',function($user){
            return(in_array('Restaurant.Update',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.delete',function($user){
            return(in_array('Restaurant.delete',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.restore',function($user){
            return(in_array('Restaurant.restore',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.forceDelete',function($user){
            return(in_array('Restaurant.forceDelete',$user->role->first()->permission->pluck('code')->toArray()));

            });

        Gate::define('Product.index',function($user){
            return(in_array('Product.index',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Product.create',function($user){
            return(in_array('Product.create',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Product.Update',function($user){
            return(in_array('Product.Update',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Product.delete',function($user){
            return(in_array('Product.delete',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Product.restore',function($user){
            return(in_array('Product.restore',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Product.forceDelete',function($user){
            return(in_array('Product.forceDelete',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.index',function($user){
            return(in_array('Order.index',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.create',function($user){
            return(in_array('Order.create',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.Update',function($user){
            return(in_array('Order.Update',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.delete',function($user){
            return(in_array('Order.delete',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.restore',function($user){
            return(in_array('Order.restore',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.forceDelete',function($user){
            return(in_array('Order.forceDelete',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Category.index',function($user){
            return(in_array('Category.index',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Category.create',function($user){
            return(in_array('Category.create',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Category.Update',function($user){
            return(in_array('Category.Update',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Category.delete',function($user){
            return(in_array('Category.delete',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Category.restore',function($user){
            return(in_array('Category.restore',$user->role->first()->permission->pluck('code')->toArray()));


        });

        Gate::define('Category.forceDelete',function($user){
            return(in_array('Category.forceDelete',$user->role->first()->permission->pluck('code')->toArray()));


        });

      }
}

