<?php

namespace App\Providers;



use App\Attribute;
use App\AttributeType;
use DebugBar\DebugBar;
use Illuminate\Support\ServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        view()->composer('admin.layout', function ($view) {

            $data = array();

            $user_model = new User();
            $data['adminImage'] =  $user_model->get_avatar(Auth::user()->avatar);
            $data['adminName'] = Auth::user()->name;
            $data['attribyt_type'] = AttributeType::all();

            $view->with($data);
        });
    }
}
