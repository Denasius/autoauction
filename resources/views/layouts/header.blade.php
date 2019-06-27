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
					@include('layouts.top_menu', ['categories'=>$categories])
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