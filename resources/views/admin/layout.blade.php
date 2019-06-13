<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>VIN - страница админа</title>
    <link href="/css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/custom-admin.css">
</head>

<body>
<!-- container section start -->
<section id="container" class="">

    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="{{route('admin')}}" class="logo">Vin <span class="lite">Admin</span></a>
        <!--logo end-->

        <div class="nav search-row" id="top_menu">
            <!--  search form start -->
            <ul class="nav top-menu">
                <li>
                    <form class="navbar-form">
                        <input class="form-control" placeholder="Search" type="text">
                    </form>
                </li>
            </ul>
            <!--  search form end -->
        </div>


    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
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
                <li class="{{request()->is('admin/tags') ? 'active' : 'no-active'}}">
                    <a href="/admin/tags">
                        <i class="fas fa-tags"></i>
                        <span>Теги</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="show_next">
                        <i class="fas fa-tasks"></i>
                        <span>Атрибуты</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        @foreach($attribyt_type as $item)
                            <li class="{{request()->is('admin/attribyt_type/') ? 'active' : false}}">
                                <a href="/admin/attributes/{{$item->slug}}">{{$item->title}}</a>
                            </li>
                        @endforeach
                        <li class="add_new {{request()->is('admin/attribyt_type/add') ? 'active' : false}}">
                            <a href="/admin/attribute_types/create"><i class="fa fa-plus"></i> Добавить</a>
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

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    @yield('content')

</section>
<!-- container section start -->

<!-- javascripts -->

<script src="/js/admin.js"></script>
{{-- <script>
    $('#dp1').datepicker({
      format: 'mm-dd-yyyy'
    });
    </script> --}}
</body>

</html>
