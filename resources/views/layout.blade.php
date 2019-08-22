<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" lang="en-US">
<![endif]-->
<html lang="en-US">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @yield('seo')


    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    {!! Html::style('css/styles.css') !!}

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="sidebar-menu-container" id="sidebar-menu-container">

    <div class="sidebar-menu-push">

        <div class="sidebar-menu-overlay"></div>

        <div class="sidebar-menu-inner">

            <div id="sub-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <div class="social-icons">
                                @isset( $socials )
                                    <ul>
                                        @foreach( $socials as $social )
                                            @if( ! empty( $social->value ) )
                                                <li><a href="{{ $social->value }}">{!! $social->descr !!}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endisset
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="information">
                                @isset($addresses)
                                    @foreach( $addresses as $address )
                                        @if (! empty( $address->value ))
                                            <span>{{ $address->value }}</span>
                                        @endif
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            @isset($phones)
                                <div class="phones">
                                    @foreach( $phones as $phone )
                                        @if (! empty( $phone->value ))
                                            <span><a href="tel:+{{ str_replace(['+', ' ', '-', '(', ')' ], '', $phone->value) }}">{{ $phone->value }}</a></span>
                                        @endif
                                    @endforeach
                                </div>
                            @endisset
                        </div>

                        <div class="col-md-3 hidden-sm">
                            <div class="right-info">

                                <ul>
                                    @if (Auth::check())
                                        <li class="auth"><a href="javascript:void(0);">Привет, {{Auth::user()->name}} <i class="fa fa-angle-down"></i></a>
                                            <ul class="profile-dropdown">
                                                <li><a href="/profile">Личный кабинет</a></li>
                                                <li class="fav"><a href="{{ route('favirites.show') }}">Избранное</a>{{-- <span class="count-favorite">2</span> --}}</li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('logout') }}">Выход</a></li>
                                    @else
                                        <li><a href="{{route('login')}}">Вход</a></li>
                                        <li><a href="{{route('registerView')}}">Регистрация</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.header')

            @if(session('status'))
                <div class="alert alert-success alert-success-ansewr">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
            
            {{-- секция партнеры --}}
            @include('layouts.partners')

            <div id="cta-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            @if($errors->any())
                                <div class="alert alert-block alert-danger fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    @foreach ($errors->all() as $error)
                                        {!! $error !!}<br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="left-content">
                                <h2>Подписаться на новости</h2>
                                <form method="POST" id="subscribe" class="blog-search" action="{{ route('subscribe') }}">
                                    @csrf
                                    <input type="text" class="blog-search-field" name="email" placeholder="E-mail Address" value="{{ old('email') }}">
                                    <div class="simple-button">
                                        <button type="submit">Подписаться</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            @isset ($socials)
                                <div class="right-content">
                                    <ul>
                                        @foreach ($socials as $social)
                                            @if (! empty( $social->value ))
                                                <li><a href="{{ $social->value }}">{!! $social->descr !!}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                            @endisset
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="about-us">
                                <img src="assets/images/logo-2.png" alt="">
                                <p>VIN.by Аукцион авто из всего мира!</p>
                                <ul>
                                    @isset( $addresses )
                                        @foreach ($addresses as $item)
                                            @if ($loop->first && ! empty( $item->value ))
                                                <li><i class="fa fa-map-marker"></i>{{ $item->value }}</li>
                                            @endif
                                        @endforeach
                                    @endisset

                                    @isset( $phones )
                                        @foreach ($phones as $item)
                                            @if ($loop->first && ! empty( $item->value ))
                                                <li class="footer_tel"><i class="fa fa-phone"></i><a
                                                            href="tel:+{{ str_replace(['+', ' ', '-', '(', ')'], '', $item->value) }}">{{ $item->value }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endisset

                                    @isset( $socials )
                                        @foreach ($socials as $item)
                                            @if (! empty( $item->value ) && ( $item->name == 'email' || $item->name == 'mail' ) )
                                                <li><i class="fa fa-envelope-o"></i>{{ $item->value }}</li>
                                            @endif
                                        @endforeach
                                    @endisset

                                </ul>
                            </div>
                        </div>
                        @include('layouts.footer_menu')
                        <div class="col-md-3">
                            <div class="latest-news">
                                <h4>Последние новости</h4>
                                @foreach($latestNews as $item)
                                    <div class="latest-item">
                                        <div class="latest-news-post">
                                            <img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('uploads/' . $item->image) }}" alt="{{ $item->title }}">
                                        </div>

                                        <div>
                                            <a href="single-blog.html"><h6>{{ $item->title }}</h6></a>
                                            <ul>
                                                <li>{{ $item->getFormatDate($item->created_at) }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="gallery">
                                <h4>Свяжитесь с нами</h4>
                                <form action="{{ route('callback') }}" class="form-general form-general__handler" id="form-general" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST">
                                    <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}">
                                    <input type="text" name="phone" placeholder="Телефон" value="{{ old('telephone') }}">

                                    <button type="submit" class="btn-callback-send">Отправить</button>
                                </form>
                                <div class="answer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <div id="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Сайт разработан компанией <a class="webernetic" href="https://webernetic.by">Webernetic</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

        </div>

    </div>

    <nav class="sidebar-menu slide-from-left">
        <div class="nano">
            <div class="content">
                @include('layouts.responsive_menu')
                
            </div>
        </div>
    </nav>

</div>

{!! Html::script('js/scripts.js') !!}
@yield('scripts_field')
<div class="overlay-filter"></div>
<img class="prelod-gif" src="{{asset('/img/loader-gifka.gif')}}" alt="Загрузка">

</body>
</html>
