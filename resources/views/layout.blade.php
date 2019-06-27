<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" lang="en-US">
<![endif]-->
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<title>Auction - Car Dealer HTML Theme</title>


	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/custom-styles.css">

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
							<div class="col-md-3 col-sm-12">
								<div class="social-icons">
									@isset( $socials )
									<ul>
										@foreach( $socials as $social )
											@if( ! empty( $social->value ) )
												<li><a href="{{ $social->value }}"><i class="fa fa-{{ $social->descr }}"></i></a></li>
											@endif
										@endforeach
									</ul>
									@endisset
								</div>
							</div>

							<div class="col-md-3 col-sm-12">
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

				<section class="clients">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div id="owl-demo">
									<div class="item">
										<img src="assets/images/client-1.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-2.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-3.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-4.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-5.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-6.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-3.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-2.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-1.png" alt="">
									</div>
									<div class="item">
										<img src="assets/images/client-4.png" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

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
										<input type="text" class="blog-search-field" name="email" placeholder="E-mail Address" value="">
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
													<li><a href="{{ $social->value }}"><i class="fa fa-{{ $social->descr }}"></i></a></li>
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
													<li class="footer_tel"><i class="fa fa-phone"></i><a href="tel:+{{ str_replace(['+', ' ', '-', '(', ')'], '', $item->value) }}">{{ $item->value }}</a></li>
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
							<div class="col-md-3">
								<div class="featured-links">
									<h4>Featured Links</h4>
									<ul>
										<li><a href="#"><i class="fa fa-caret-right"></i>About Us</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Term &amp; Services</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Meet The Team</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Privacy Policy</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Company News</a></li>
									</ul>
									<ul>
										<li><a href="#"><i class="fa fa-caret-right"></i>Shop</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>New Vehicle</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Features</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Promotions</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i>Contact</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-3">
								<div class="latest-news">
									<h4>Latest News</h4>
									<div class="latest-item">
										<img src="http://dummyimage.com/64x64/cccccc/fff.jpg" alt="">
										<a href="single-blog.html"><h6>Hella Kogi Whatever</h6></a>
										<ul>
											<li>24 Sep,2015</li>
											<li>2 comments</li>
										</ul>
									</div>
									<div class="latest-item">
										<img src="http://dummyimage.com/64x64/cccccc/fff.jpg" alt="">
										<a href="single-blog.html"><h6>Retro Art Party</h6></a>
										<ul>
											<li>21 Sep,2015</li>
											<li>2 comments</li>
										</ul>
									</div>
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
								<p>Copyrights 2015 <em>Auction</em>. Developed by Robert</p>
							</div>
							<div class="col-md-6 col-sm-12">
								<ul>
									<li><a href="#">Home</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Shop</a></li>
									<li><a href="#">Pages</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
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
					<nav class="responsive-menu">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About Us</a></li>
							<li><a href="services.html">Services</a></li>
							<li class="menu-item-has-children"><a href="#">Listing</a>
								<ul class="sub-menu">
									<li><a href="listing-right.html">Sidebar Right</a></li>
									<li><a href="listing-left.html">Sidebar Left</a></li>
									<li><a href="listing-grid.html">Grids System</a></li>
									<li><a href="single-list.html">Car Details</a></li>
								</ul>
							</li>
							<li class="menu-item-has-children"><a href="#">Blog</a>
								<ul class="sub-menu">
									<li><a href="blog-right.html">Classic</a></li>
									<li><a href="blog-grid.html">Grids System</a></li>
									<li><a href="grid-right.html">Grids Sidebar</a></li>
									<li><a href="single-blog.html">Single Post</a></li>
								</ul>
							</li>
							<li><a href="about.html">About</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</nav>

	</div>
  
  <script src="js/scripts.js"></script>

</body>
</html>