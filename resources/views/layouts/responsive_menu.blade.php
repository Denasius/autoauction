<nav class="responsive-menu">
    <ul>
        @if (Auth::check())
            <li class="menu-item-has-children"><a href="javascript:void(0);">Привет, {{Auth::user()->name}}</a>
                <ul class="sub-menu">
                    <li><a href="/profile">Личный кабинет</a></li><li><a href="{{ route('favirites.show') }}">Избранное</a></li>
                </ul>
            </li>
            <li><a href="{{ route('logout') }}">Выход</a></li>
        @else
            <li><a href="{{route('login')}}">Вход</a></li>
            <li><a href="{{route('registerView')}}">Регистрация</a></li>
        @endif
        @foreach ($mainMenu as $menu)
            <li class="{{ $menu['class'] }} @if($menu['child']) menu-item-has-children @endif"><a href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                @if($menu['child'])
                    <ul class="sub-menu">
                        @foreach( $menu['child'] as $child )
                            <li class="{{ $child['class'] }}"><a href="{{ $child['link'] }}">{{ $child['label'] }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
    </nav>