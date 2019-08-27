@extends('layout')

@section('seo')
  <title>{{ $meta_title }}</title>
  <meta name="description" content="{{ $meta_description }}">
@endsection

@section('content')

<div id="page-heading" @if($category_image['image'] != null) class="lazyloading" style="background-image: url( {{ asset('img/th.jpg')  }} );" data-src="{{ asset('uploads/' . $category_image['image']) }}" @endif>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>{{ $title }}</h1>
				<div class="line"></div>
				<span>{!! $description['descr'] !!}</span>
				<div class="page-active">
					<ul>
						<li><a href="/">Главная</a></li>
						<li><i class="fas fa-circle"></i></li>
						<li><a href="javascript:void(0)">{{ $title }}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="listing-grid">
	<div class="container">
		<div class="row">
			<div id="listing-cars" class="col-md-9">
				<div class="pre-featured clearfix">
					<div class="info-text">
						<p class="search-result">Найдено <span id="lot_counted">{{ $lots->count() }}</span> лотов</p>
					</div>
					<div class="right-content">
						<form class="form-filter" action="{{ route('filter') }}" method="POST">
							@csrf					
							<div class="input-select">
								<select name="sort" id="mark" class="mark-top-filter global-filter">
									<option value="-1">Сортировать по</option>
										<option value="title">Наименование</option>
										<option value="car_mileage">Пробег</option>
										<option value="price">Цена</option>
										<option value="date">Год</option>
								</select>
							</div>
						</form>

						{{-- <div class="grid-list">
							<ul>
								<li><a href="#"><i class="fa fa-list"></i></a></li>
								<li><a href="#"><i class="fa fa-square"></i></a></li>
							</ul>
						</div> --}}
					</div>
				</div>
				<div class="auction-categories">
					@if ( $subcategories ) 
						<ul>
							@if($subcategories_list)
								@foreach ($subcategories_list as $list)
									<li><a href="{{url($list->slug)}}">{{ $list->title }}</a></li>
								@endforeach
							@endif
						</ul>
						<a class="more more-auctions" href="javascript:void(0)">Еще аукционы</a>
					@else
						<div class="go-to-back">
							<a href="{{ url()->previous() }}" id="back-button">Назад</a>
						</div>
					@endif
				</div>
				<div id="featured-cars">
					<div class="row">
						@foreach ($lots as $lot)
							<div class="featured-item col-md-4">
								<div class="lot-image">
									<img 
										class="lazyloading" 
										src="{{ asset('img/th.jpg') }}" 
										@if($lot->image == null)
											data-src="{{ asset('img/no-image.png') }}"
										@else
											data-src="{{ asset($lot->image) }}" 
										@endif
										alt="{{ $lot->title }}"
									>
								</div>
								<div class="down-content">
									<a href="{{ $lot->slug }}"><p class="h2">{{ $lot->title }}</p></a>
									<span>{{ number_format($lot->price, 0) }} {{ $lot->currency }}</span>
									<div class="light-line"></div>
									<p>{{ strip_tags( $lot->getFormatString($lot->desr, 55) ) }}</p>
									<div class="car-info">
										<ul>
											<li><i class="icon-gaspump"></i>{{ $lot->fuel }}</li>
											<li><i class="icon-car"></i>{{ $lot->car_model }}</li>
											<li><i class="icon-road2"></i>{{ $lot->car_mileage }}</li>
										</ul>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>

				<div class="paginate">
					{{$lots->render()}}
				</div>
			</div>
			<form class="global-search global-filter" action="{{ route('global-search') }}" method="POST">
				@csrf
				<input type="hidden" name="category_id" value="{{ $category }}">
				<div id="sidebar" class="col-md-3">
					<div class="sidebar-content">
						<div class="head-side-bar">
							<p class="searching-title">Расширенный поиск</p>
						</div>
						<div class="search-form">
							<div class="select">
								<select id="make" name="car_brend">
									<option value="-1">Марка</option>
									@foreach ($all_brands as $brand)
										<option value="{{ $brand->id }}">{{ $brand->title }}</option>
									@endforeach
								</select>
							</div>
							<div class="select">
								<select name="car_model" id="model">
									<option value="-1" class="selected" selected>Модель</option>
								</select>
							</div>
							<div class="select">
								<select name="date" id="style">
									<option value="-1">Год</option>
									@foreach ($lots_year as $lot)
										<option value="{{ $lot->date }}">{{ $lot->date }}</option>
									@endforeach
								</select>
							</div>
							<div class="slider-range">
								<p>
									<input type="text" name="price" class="range price" id="amount" readonly>
								</p>
								<div id="slider-range"></div>
							</div>

							<div class="checkbox-label">
								<label for="tax">С НДС</label>
								<input type="checkbox" name="tax" id="tax">
							</div>

							<div class="select">
								<select name="car_mileage" id="types" class="car_mileage">
									<option value="-1">Пробег</option>
									@foreach ($milleage as $item)
										<option value="{{ $item->car_mileage }}">{{ number_format($item->car_mileage, 0) }} км</option>
									@endforeach
								</select>
							</div>
							@foreach ($attr_tree as $key => $value)
								<div class="select">
									<select name="attributes[]">
										<option value="-1" selected>{{ $key }}</option>
										@foreach ($value as $option)
											<option value="{{ $option['id'] }}">{{ $option['title'] }}</option>
										
										@endforeach
									</select>
								</div>
							@endforeach

							{{-- <div class="select">
								<select name="body_type" id="body_type">
									<option value="-1">Тип кузова</option>
									
								</select>
							</div> --}}
							<div class="advanced-button">
								<button class="btn-filter-search" href="listing-right.html">Поиск<i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
					{{-- Блок авто купить в один клик --}}
					<p class="title-buy-one-click">Купить в один клик</p>
					@foreach ($buy_one_click as $item)
						<div class="video-post">
							<div class="video-holder">
								<img 
									class="img-buy-one-click lazyloading" 
									src="{{ asset('img/th.jpg') }}" 
									data-src="{{ asset($item->image) }}" 
									alt="{{ $item->title }}"
								>
								<div class="video-content">
									<a href="{{ $item->slug }}"><h4>{{ $item->title }}</h4></a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</form>
		</div>
	</div>
</section>


<script type="text/javascript">
	(function ($) {
		var getCarsModels = function () {
			$('#make').on('change', function () {
				var _this = $(this),
					_token = '{{ csrf_token() }}',
					_method = 'post',
					_url = "{{ route('search-filter') }}",
					_value = _this.val();

				return $.ajax({
					headers: {
						'X-CSRF-TOKEN':_token
					},
					type: _method,
					url: _url,
					data: {values: _value},
					success: function (response) {
						$('#model').find('option').not('.selected').remove();
						$('#model').append(response)
					},
					error: function (request, errorStatus, errorThrown) {
						console.log(request);
						console.log(errorStatus);
						console.log(errorThrown);
					}
				});
			});
		};

		var sliderRange = function () {
			$( "#slider-range" ).slider({
				range: true,
				step:1,
				min: {{ $min_price }},
				max: {{ $max_price }},
				values: [ {{ $min_price }}, {{ $max_price }} ],
				slide: function( event, ui ) {
					$( "#amount" ).val(ui.values[ 0 ] + " BYN" + " - " + ui.values[ 1 ] + " BYN" );
				}
			});
			$( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) + " BYN" + " - " + $( "#slider-range" ).slider( "values", 1 ) + " BYN" );
		};

		var showMoreSubCategories = function () {
			$('.more-auctions').on('click', function () {
				$(this).closest('.auction-categories').find('ul > li').show();
				$(this).hide();
			});
		}

		$(document).ready(function () {
			getCarsModels();
			sliderRange();
			showMoreSubCategories();
		});
	})(jQuery)
</script>
@endsection
