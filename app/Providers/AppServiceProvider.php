<?php

namespace App\Providers;



use App\Attribute;
use App\AttributeType;
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

            $attribyte_type_model = new AttributeType();

            $data = array();

            $data['adminImage'] = User::where('id', Auth::user()->id)->first()->getImage();
            $data['adminName'] = User::where('id', Auth::user()->id)->first()->name;




            $data['attribyt_type'] = $attribyte_type_model->get_all();

            $view->with($data);
        });
    }
}
