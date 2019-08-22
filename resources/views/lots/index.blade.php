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
		@if( session('byu_one_click_success') )
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-success">
							{{ session('byu_one_click_success') }}
						</div>
					</div>
				</div>
			</div>
		@endif
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
						@if( $lot->status == $lot_is_opened )
						<div class="location-lot">
							<span class="location">Машина в {{ $lot->address }}</span>
							<span class="lot">лот №<strong>{{ $lot->id }}</strong></span>
						</div>
						<div class="lot-bet">
							
								<div class="current-bet">
									@if( $max_bet != null )
									<span id="current-bet_price" class="current-bet_price">Текущая ставка <strong>{!! $lot->getPrice($max_bet, $lot->currency) !!}</strong></span>
									@else
									<span id="current-bet_price" class="current-bet_price">Текущая ставка <strong>{!! $lot->getPrice($lot->lot_bet, $lot->currency) !!}</strong></span>
									@endif

									<span class="min-bet">Минимальный шаг: <strong>{!! $lot->getPrice($lot->min_bet, $lot->currency) !!}</strong></span>

									<button class="reload-bet" data-action="{{ route('reload.bet') }}" data-lot-id="{{ $lot->id }}" data-method="post">Обновить ставки</button>
									<img class="reload-gif" src="{{ asset('img/reload-bet.gif') }}" alt="reload">
								</div>
								@if (Auth::check())
									<div class="max-bet">
										<form class="bet-form" action="{{route('make.bet')}}" method="post" data-lot="{{ $lot->id }}" @if (Auth::check()) data-user="{{ Auth::user()->id }}" @endif>
											<input type="text" class="max_bet" name="bet" placeholder="Ваша максимальная ставка"><button type="submit" name="go_bet">Сделать ставку</button>
										</form>
										<div class="answer"></div>
									</div>
								@endif						
							
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
								@if( $lot->lot_time != null )
									<span>Завершение торгов <strong>{{ date('d.m.Y', strtotime($lot->lot_time)) }}</strong></span>
								@endif
								
							</div>
						</div>
						<div class="buy-one-click">
							<span>Начальная стоимость <strong>{!! $lot->getPrice($lot->price, $lot->currency) !!}</strong></span>
							@if( $lot->buy_one_click != null )
							<span>Купить сейчас <strong>{!! $lot->getPrice($lot->buy_one_click_price, $lot->currency) !!}</strong></span>
							<form class="form-buy-one-click" action="{{ route('buy.one.click') }}" method="post">
								@csrf
								<input type="hidden" name="buy_one_click_price" value="{{ $lot->buy_one_click_price }}">
								@if(Auth::check())
									<input type="hidden" name="user" value="{{ Auth::user()->id }}">
									<input type="hidden" name="lot_id" value="{{ $lot->id }}">
									<button>Купить сейчас</button>
								@endif
							</form>
							@endif
						</div>
						<div class="information-lot">
							@if( $lot->car_from_europe != null )
								<span>Стоимость доставки <strong>{!! $lot->getPrice($lot->shipping, $lot->currency) !!}</strong></span>
								<span>Дополнительные сборы <strong>{!! $lot->getPrice($lot->fees, $lot->currency) !!}</strong></span>
							@else
							<span>Дополнительные сборы <strong>{!! $lot->getPrice($lot->fees_all, $lot->currency) !!}</strong></span>
							@endif
						</div>
						<div class="offers">
							<input type="checkbox" name="contract" checked>
							<span>Я согласен с <a href="#">договором офферты</a></span>
						</div>
					@else
					</div>
					<div class="lot-finish">
						<div class="lock">
							<div class="closest">
								
								<i class="fas fa-user-lock"></i>
							</div>
						</div>
						<div class="lot-finish_text">
							<p>Этот лот завершил участие в аукционе</p>
						</div>
						
					</div>
				</div>
				@endif
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
	</section>

	<section class="featured-listing">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-section-2 text-center">
						<h2>Активные лоты</h2>
						<div class="dec"><i class="fa fa-car"></i></div>
						<div class="line-dec"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div id="featured-cars">
					@foreach ($active_lots as $active_lot)
						<div class="featured-item col-md-3">
							<img src="{{ asset($active_lot->image) }}" alt="{{ $active_lot->title }}">
							<div class="down-content">
								<a href="{{ $active_lot->slug }}"><h2>{{ $active_lot->title }}</h2></a>
								<span>{!! $active_lot->getPrice($active_lot->price, $active_lot->currency) !!}</span>
								<div class="light-line"></div>
								<p>{{ strip_tags($lot->getFormatString($lot->desr, 60)) }}</p>
								<div class="car-info">
									<ul>
										<li><i class="icon-gaspump"></i>{{ $active_lot->fuel }}</li>
										<li><i class="icon-car"></i>{{ $active_lot->car_model }}</li>
										<li><i class="icon-road2"></i>{{ $active_lot->car_mileage }}</li>
									</ul>
								</div>
							</div>
						</div>
					@endforeach

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
				date: '{{date('m/d/Y H:i:s', strtotime($lot->lot_time))}}',
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
