<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="/img/favicon.png">
    <title>VIN - страница админа</title>
    <link href="/css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/custom-admin.css">
    {{-- <link rel="stylesheet" href="/css/dropzone.css"> --}}
    <script src="/js/jquery.js"></script>
</head>

<body>
<!-- container section start -->
<section id="container" class="">

    <header class="header dark-bg">
        <div class="row">
            <div class="col-sm-2">
                <a href="{{route('admin')}}" class="logo">Vin <span class="lite">Admin</span></a>
            </div>
            <div class="col-sm-6">
                <div class="nav search-row" id="top_menu">

                    <form id="search_form" action="/admin/search" method="POST">
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input class="form-control" placeholder="Поиск" type="text" name="search" autocomplete="off">
                    </form>
                    <div id="search_result"></div>
                    <!--  search form end -->
                </div>
            </div>
            <div class="col-sm-2">

            </div>
            <div class="col-sm-2">
                <div class="go_front">
                    <a href="{{route('home')}}"><i class="fas fa-igloo"></i> На сайт</a>
                </div>
            </div>
        </div>


    </header>
    <!--header end-->

    <!--sidebar start-->

    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="{{request()->is('admin') ? 'active' : 'no-active'}}">
                <a class="" href="/admin">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Админ-панель</span>
                </a>
            </li>
            <li class="{{request()->is('admin/pages') ? 'active' : 'no-active'}}">
                <a class="" href="/admin/pages">
                    <i class="fas fa-file"></i>
                    <span>Страницы</span>
                </a>
            </li>
            <li class="{{request()->is('admin/lots') ? 'active' : 'no-active'}}">
                <a href="/admin/lots" class="">
                    <i class="fas fa-car"></i>
                    <span>Лоты</span>
                </a>
            </li>
            <li class="{{request()->is('admin/categories') ? 'active' : 'no-active'}}">
                <a href="/admin/categories" class="">
                    <i class="fas fa-th"></i>
                    <span>Категории</span>
                </a>
            </li>

            <li class="{{ request()->is('admin/tags') || request()->is('admin/attributes' ) || request()->is('admin/attribute-category' ) ? 'active' : 'no-active'}} sub-menu">
                <a href="/admin/attributes" class="">
                    <i class="fas fa-tasks"></i>
                    <span>Атрибуты/Теги</span>
                </a>
                <ul>
                    <li class="{{request()->is('admin/tags') ? 'active' : 'no-active'}}">
                        <a href="/admin/tags">
                            <i class="fas fa-tags"></i>
                            <span>Теги</span>
                        </a>
                    </li>
                    <li class="{{request()->is('admin/attributes') ? 'active' : 'no-active'}}">
                        <a href="/admin/attributes">
                            <i class="fas fa-tasks"></i>
                            <span>Атрибуты</span>
                        </a>
                    </li>
                    <li class="{{request()->is('admin/attribute-category') ? 'active' : 'no-active'}}">
                        <a href="/admin/attribute-category" class="">
                            <i class="fas fa-tasks"></i>
                            <span>Категории атрибутов</span>
                        </a>
                    </li>
                </ul>
            </li>




            <li class="{{request()->is('admin/bets') ? 'active' : 'no-active'}}">
                <a href="/admin/bets" class="">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span>Ставки</span>
                </a>
            </li>
            <li class="{{request()->is('admin/users') ? 'active' : 'no-active'}}">
                <a class="" href="/admin/users">
                    <i class="fas fa-users"></i>
                    <span>Пользователи</span>
                </a>
            </li>
            <li class="{{request()->is('admin/comments') ? 'active' : 'no-active'}}">
                <a href="/admin/comments" class="">
                    <i class="fas fa-comments"></i>
                    <span>Комментарии</span>
                </a>
            </li>
            <li class="{{request()->is('admin/subscribtions') ? 'active' : 'no-active'}}">
                <a href="/admin/subscribtions" class="">
                    <i class="fas fa-id-card"></i>
                    <span>Подписчики</span>
                </a>
            </li>
            <li class="{{request()->is('admin/aliases') ? 'active' : 'no-active'}}">
                <a href="/admin/aliases" class="">
                    <i class="fas fa-link"></i>
                    <span>ЧПУ</span>
                </a>
            </li>
            <hr>
            <li class="{{ request()->is('admin/settings') || request()->is('admin/sliders' ) ? 'active' : 'no-active'}} sub-menu">
                <a href="/admin/settings" class="">
                    <i class="fas fa-cogs"></i>
                    <span>Настройки</span>
                </a>
                <ul>
                    <li>
                        <a href="/admin/sliders" class="">
                            <i class="fas fa-cubes"></i>
                            <span>Слайдер</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>

    <!--sidebar end-->

    @yield('content')

</section>
<script src="/js/admin.js"></script>

</body>
</html>
