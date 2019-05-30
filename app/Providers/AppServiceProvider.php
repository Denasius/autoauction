<?php

namespace App\Providers;



use Illuminate\Support\ServiceProvider;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //dd(User::where('is_admin', 1)->first()->getImage());    
        view()->composer('admin.layout', function ($view) {
            $view->with('adminImage', User::where('is_admin', 1)->first()->getImage());
            $view->with('adminName', User::where('is_admin', 1)->first()->name);
            $view->with('scripts', request()->is('admin/lots/create') ? 'admin-form-component' : 'admin');
        });
    }
}
