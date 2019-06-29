<header class="site-header">

	<div id="main-header" class="main-header header-sticky">
		<div class="inner-header container clearfix">
			<div class="logo">
				<a href="/"><img src="assets/images/logo.png" alt=""></a>
			</div>
			<div class="header-right-toggle pull-right hidden-md hidden-lg">
				<a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i></a>
			</div>
			<nav class="main-navigation text-left hidden-xs hidden-sm">
			
				<ul>
					{{-- @include('layouts.top_menu', ['categories'=>$categories]) --}}
					<li><a href="{{ url('aukciony') }}">Аукционы</a></li>
					<li><a href="{{ url('pokupatelyam') }}">Покупателям</a></li>
					<li><a href="javascript:void(0)" class="has-submenu">Продавцам</a>
						<ul class="sub-menu">
							<li><a href="{{ url('yur-licam') }}">Юр лицам</a></li>
							<li><a href="{{ url('fiz-licam') }}">Физ лицам</a></li>
							<li><a href="javascript:void(0)">Дилерам</a></li>
						</ul>
					</li>
					<li><a href="{{ url('prodano') }}">Продано</a></li>
					<li><a href="javascript:void(0)" class="has-submenu">Услуги</a>
						<ul class="sub-menu">
							<li><a href="{{ url('proverka-avto-po-vin') }}">Проверка авто по VIN</a></li>
							<li><a href="{{ url('pomosch') }}">Помощь</a></li>
							<li><a href="javascript:void(0)">Trade In</a></li>
							<li><a href="javascript:void(0)">Расстаможка</a></li>
							<li><a href="javascript:void(0)">Диагностика</a></li>
							<li><a href="javascript:void(0)">Оценка стоимости</a></li>
						</ul>
					</li>
					<li><a href="" class="has-submenu">Общее</a>
						<ul class="sub-menu">
							<li><a href="{{ url('novosti') }}">Новости</a></li>
							<li><a href="{{ url('o-nas') }}">О нас</a></li>
							<li><a href="{{ url('kontakty') }}">Контакты</a></li>
							<li><a href="javascript:void(0)">Партнеры</a></li>
							<li><a href="javascript:void(0)">Об оплате</a></li>
							<li><a href="javascript:void(0)">Пользовательское соглашение</a></li>
							<li><a href="javascript:void(0)">Правила регистрации</a></li>
							<li><a href="javascript:void(0)">О торгах</a></li>
							<li><a href="javascript:void(0)">FAQ</a></li>
						</ul>
					</li>
					<li>
						<p><a href="#" id="example-show" class="showLink" onclick="showHide('example');return false;"><i class="fa fa-search"></i></a></p>
						<div id="example" class="more">
							<form id="search_form_front" action="{{ route('searching') }}" method="GET">
								<input type="hidden" name="_method" value="GET">
                        		<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="text" class="blog-search-field" name="query" autocomplete="off" placeholder="Поиск по сайту" value="{{ request()->input('query') }}">
							</form>
							<p><a href="#" id="example-hide" class="hideLink" 
							onclick="showHide('example');return false;"><i class="
							fa fa-close"></i></a></p>
						</div>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>