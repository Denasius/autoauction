<?php

namespace App\Providers;



use App\Attribute;
use App\Category;
use App\Setting;
use App\AttributeType;
use DebugBar\DebugBar;
use Illuminate\Support\ServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Admin\SearchController;

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

            $data = [];

            $user_model = new User();
            $data['adminImage'] =  $user_model->get_avatar(Auth::user()->avatar);
            $data['adminName'] = Auth::user()->name;
//            $data['attribyt_type'] = AttributeCategory::all();

            $view->with($data);
        });

        view()->composer('layout', function ($view){
            $view->with('addresses', Setting::where('version', '=', 'address')->get());
            $view->with('socials', Setting::where('version', '=', 'socials')->get());
            $view->with('phones', Setting::where('version', '=', 'phones')->get());
            $view->with('categories', Category::where('parent_category', 0)->get());
        });
    }

    protected static function get_breadcrumb_header_result($route, $event){

        $class = [
            'index'   => [
                'class' => 'btn-add',
                'text'  => 'Добавить',
                'title' => 'Добавить'
            ],
            'create'  => [
                'class' => 'btn-back',
                'text'  => 'Назад',
                'title' => 'Добавить'
            ],
            'edit'  => [
                'class' => 'btn-back',
                'text'  => 'Назад',
                'title' => 'Редактировать'
            ],
            'show'  => [
                'class' => 'btn-back',
                'text'  => 'Назад',
                'title' => 'Редактировать'
            ],
        ];

        $info = [
            'home'          => [
                'icon'          => '<i class="fas fa-tachometer-alt"></i>',
                'title'         => 'АДМИН-ПАНЕЛЬ',
                'title_create'  => '',
            ],
            'pages'         => [
                'icon'          => '<i class="fas fa-file"></i>',
                'title'         => 'Страницы',
                'title_create'  => 'страницу',
            ],
            'lots'          => [
                'icon'          => '<i class="fas fa-car"></i>',
                'title'         => 'Лоты',
                'title_create'  => 'лот',
            ],
            'categories'    => [
                'icon'          => '<i class="fas fa-th"></i>',
                'title'         => 'Категории',
                'title_create'  => 'категорию'
            ],
            'tags'          => [
                'icon'          => '<i class="fas fa-tags"></i>',
                'title'         => 'Теги',
                'title_create'  => 'тег',
            ],
            'attributes'    => [
                'icon'          => '<i class="fas fa-tasks"></i>',
                'title'         => 'Атрибуты',
                'title_create'  => 'атрибут',
            ],
            'attribute-category'    => [
                'icon'          => '<i class="fas fa-tasks"></i>',
                'title'         => 'Типы атрибутов',
                'title_create'  => 'тип',
            ],
            'bets'          => [
                'icon'          => '<i class="fas fa-hand-holding-usd"></i>',
                'title'         => 'Ставки',
                'title_create'  => 'ставку',
            ],
            'users'         => [
                'icon'          => '<i class="fas fa-users"></i>',
                'title'         => 'Пользователи',
                'title_create'  => 'пользователя',
            ],
            'comments'      => [
                'icon'          => '<i class="fas fa-comments"></i>',
                'title'         => 'Комментарии',
                'title_create'  => 'комментарий',
            ],
            'subscribtions'      => [
                'icon'          => '<i class="fas fa-id-card"></i>',
                'title'         => 'Подписчики',
                'title_create'  => 'Подписчика',
            ],
            'aliases'      => [
                'icon'          => '<i class="fas fa-link"></i>',
                'title'         => 'ЧПУ',
                'title_create'  => 'ЧПУ',
            ],
        ];

        $data = [];
        $data['icon'] = $info[$route]['icon'];
        $data['title'] = $info[$route]['title'];
        $data['btn'] = $class[$event];
        $data['btn_href'] = $route . '.index';
        $data['breadcrumb'] = [
            'href'  => false,
            'title' => $info[$route]['title'],
        ];

        if ($event == 'index') {
            $data['btn_href'] = $route . '.create';
        }else {
            $data['title'] = $class[$event]['title'] . ' ' . $info[$route]['title_create'];
            $data['breadcrumb'] = [
                'href'  => $route . '.index',
                'title' => $info[$route]['title'],
            ];
        }


        return $data;
    }

    public static function get_breadcrumb_header(){
        $route = \Request::route()->getName();
        $arr = explode('.', $route);
        return AppServiceProvider::get_breadcrumb_header_result($arr[0], $arr[1]);
    }
}
