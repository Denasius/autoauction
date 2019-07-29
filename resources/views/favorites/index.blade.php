@extends('layout')

@section('seo')
  <title>Избранное</title>
  <meta name="description" content="Избранное">
  
@endsection

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 auction-single">
				<div class="page-active">
					<ul class="breadcrumb">
						<li><a href="/">Главная</a></li>
						<li><i class="fas fa-chevron-right"></i></li>
						<li><a href="aukciony">Избранное</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	@if (!$lots)
		<span>Лоты отсутствуют</span>
	@else
		<section class="listing-grid">	
			<div class="container">
				<div class="row">
					<div class="pre-featured clearfix info-text">
						<h4><span id="lot_counted">{{ $lots->count() }}</span> избранных лота</h4>
					</div>	
					<div id="featured-cars">
							<div class="row">
								@foreach ($lots as $lot)
									<div class="featured-item col-md-4">
										<div class="lot-image">
											<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset($lot->image) }}" alt="{{ $lot->title }}">
										</div>
										<div class="down-content">
											<a href="{{ $lot->slug }}"><h2 class="h2">{{ $lot->title }}</h2></a>
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
				</div>
			</div>
		</section>
	@endif

@endsection