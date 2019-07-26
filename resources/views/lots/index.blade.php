@extends('layout')

@section('seo')
  <title>{{ $lot->meta_title }}</title>
  <meta name="description" content="{{ $lot->meta_description }}">
  
@endsection

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 auction-single">
				<div class="page-active">
					<ul class="breadcrumb">
						<li><a href="/">Главная</a></li>
						<li><i class="fas fa-chevron-right"></i></li>
						<li><a href="aukciony">Аукционы</a></li>
						<li><i class="fas fa-chevron-right"></i></li>
						<li><a href="javascript:void(0);">{{ $lot->title }}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<section class="car-details">
		<div class="container">
			<div class="row">
				<div id="single-car" class="col-md-5">
					
					<div class="flexslider">
						<ul class="slides">
						    <li data-thumb="{{ asset($lot->image) }}" class="first-element">
						      <img src="{{ asset($lot->image) }}" alt="{{ $lot->title }}" title="{{ $lot->title }}">
						    </li>
						   @foreach ($lot_images as $thumbnail)
							    <li data-thumb="{{ asset($thumbnail->image_src) }}">
							      <img src="{{ asset($thumbnail->image_src) }}" alt="{{ $thumbnail->image_alt }}" title="{{ $thumbnail->image_title }}">
							    </li>
						    @endforeach
						</ul>
					</div>
					
				</div>
				<div id="left-info" class="col-md-7">
					<div class="details">
						<div class="head-side-bar">
							<h4>{{ $lot->title }}</h4>
							@if (Auth::check())
								@include('lots.layouts._wishlist_buttons')
							@endif
						</div>
						<div class="location-lot">
							<span class="location">Машина в {{ $lot->address }}</span>
							<span class="lot">лот №<strong>{{ $lot->id }}</strong></span>
						</div>
						<div class="lot-bet">
							<div class="current-bet">
								<span>Текущая ставка <strong>{!! $lot->getPrice($lot->price, $lot->currency) !!}</strong></span>
							</div>
							<div class="max-bet">
								<form class="bet-form" action="" method="post">
									<input type="text" class="max_bet" name="bet" placeholder="Ваша максимальная ставка"><button type="submit" name="go_bet">Сделать ставку</button>
								</form>
							</div>							
						</div>
						<div class="sprint">							

								<ul class="countdown">
									<li> <span class="days">00</span>
									<p class="days_ref">дней</p>
									</li>
									<li class="seperator">|</li>
									<li> <span class="hours">00</span>
									<p class="hours_ref">часов</p>
									</li>
									<li class="seperator">|</li>
									<li> <span class="minutes">00</span>
									<p class="minutes_ref">минут</p>
									</li>
									<li class="seperator">|</li>
									<li> <span class="seconds">00</span>
									<p class="seconds_ref">секунд</p>
									</li>
								</ul>
							
							<div class="start-bets">
								<span>Начало торгов <strong>{{ date('d.m.Y', strtotime($lot->lot_start)) }}</strong></span>
							</div>
							<div class="finish-bets">
								<span>Завершение торгов <strong>{{ date('d.m.Y', strtotime($lot->lot_time)) }}</strong></span>
							</div>
						</div>
						<div class="buy-one-click">
							<span>Начальная стоимость <strong>{!! $lot->getPrice($lot->price, $lot->currency) !!}</strong></span>
							<span>Купить сейчас <strong>{!! $lot->getPrice($lot->buy_one_click_price, $lot->currency) !!}</strong></span>
							<button>Купить сейчас</button>
						</div>
						<div class="information-lot">
							<span>Стоимость доставки <strong>{!! $lot->getPrice($lot->shipping, $lot->currency) !!}</strong></span>
							<span>Дополнительные сборы <strong>{!! $lot->getPrice($lot->fees, $lot->currency) !!}</strong></span>
						</div>
						<div class="offers">
							<input type="checkbox" name="contract" checked>
							<span>Я согласен с <a href="#">договором офферты</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-12 tab-block">
			    	<div class="loader">
			    		<img src="{{ asset('img/image.gif') }}" alt="preloader">
			    	</div>
					<div class="tab">
						<div class="tabs">
							@include('lots.layouts._tabs_nav')
						    <div class="tab-contents" id="content">
						    	@include('lots.layouts._main')
						    </div>
						    
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="featured-listing">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-section-2 text-center">
						<h2>Recent Vehicles</h2>
						<span>Vivamus gravida magna massa in cursus mi vehicula at. Nunc sem quam suscipit</span>
						<div class="dec"><i class="fa fa-car"></i></div>
						<div class="line-dec"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div id="featured-cars">
					<div class="featured-item col-md-3">
						<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
						<div class="down-content">
							<a href="single-list.html"><h2>Mercedes Amg 6.3</h2></a>
							<span>52,000</span>
							<div class="light-line"></div>
							<p>Donec eu nullas sapien pretium volutpat vel quis turpis. Donec vel risus lacinia euismod urna vel fringilla justo.</p>
							<div class="car-info">
								<ul>
									<li><i class="icon-gaspump"></i>Diesel</li>
									<li><i class="icon-car"></i>Sport</li>
									<li><i class="icon-road2"></i>12,000</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="featured-item col-md-3">
						<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
						<div class="down-content">
							<a href="single-list.html"><h2>vw golf VII GTI</h2></a>
							<span>30,000</span>
							<div class="light-line"></div>
							<p>Donec eu nullas sapien pretium volutpat vel quis turpis. Donec vel risus lacinia euismod urna vel fringilla justo.</p>
							<div class="car-info">
								<ul>
									<li><i class="icon-gaspump"></i>Diesel</li>
									<li><i class="icon-car"></i>Sport</li>
									<li><i class="icon-road2"></i>12,000</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="featured-item col-md-3">
						<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
						<div class="down-content">
							<a href="single-list.html"><h2>mercedes amg gt</h2></a>
							<span>65,000</span>
							<div class="light-line"></div>
							<p>Donec eu nullas sapien pretium volutpat vel quis turpis. Donec vel risus lacinia euismod urna vel fringilla justo.</p>
							<div class="car-info">
								<ul>
									<li><i class="icon-gaspump"></i>Diesel</li>
									<li><i class="icon-car"></i>Sport</li>
									<li><i class="icon-road2"></i>12,000</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="featured-item col-md-3">
						<img src="http://dummyimage.com/310x210/cccccc/fff.jpg" alt="">
						<div class="down-content">
							<a href="single-list.html"><h2>bmw m4 430D</h2></a>
							<span>64,000</span>
							<div class="light-line"></div>
							<p>Donec eu nullas sapien pretium volutpat vel quis turpis. Donec vel risus lacinia euismod urna vel fringilla justo.</p>
							<div class="car-info">
								<ul>
									<li><i class="icon-gaspump"></i>Diesel</li>
									<li><i class="icon-car"></i>Sport</li>
									<li><i class="icon-road2"></i>12,000</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('scripts_field')

<script type="text/javascript">
	(function ($) {

		var initTimer = function () {
			$('.countdown').downCount({
		        date: '{{date('m/d/Y', strtotime($lot->lot_time))}} 12:00:00',
		        offset: +10
		    }, function () {
		        $('button[name="go_bet"]').attr('disabled', true).css({
					'background-color' : 'rgba(244,194,61,0.3)',
					'color' : '#333',
					'opacity' : '0.5',
					'cursor' : 'help'
				});
				$('.max_bet').attr('readonly', true).css({
					'border-right-color' : 'rgba(244,194,61,0.3)'
				});
		    });
		}

		$(document).ready(function () {
			initTimer();

		});
	})(jQuery)
</script>
@endsection