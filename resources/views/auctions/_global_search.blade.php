{{-- кастыль! позже сделаю нормально --}}
<input type="hidden" id="response_lot_count" value="{{ $lots->count() }}">
<div class="row">
	@if( $lots->count() > 0 )

		@foreach ($lots as $lot)
			<div class="featured-item col-md-4">
				<div class="lot-image">
					<img src="{{ $lot->image }}" alt="{{ $lot->title }}">
				</div>
				<div class="down-content">
					<a href="{{ $lot->slug }}"><h2>{{ $lot->title }}</h2></a>
					<span>{{ number_format($lot->price, 0) }} {{ $lot->currency }}</span>
					<div class="light-line"></div>
					<p>{{ strip_tags( $lot->getFormatString($lot->desr, 60) ) }}</p>
					<div class="car-info">
						<ul>
							<li><i class="icon-gaspump"></i>{{ $lot->fuel }}</li>
							<li><i class="icon-car"></i>{{ $lot->car_model }}</li>
							<li><i class="icon-road2"></i>{{ $lot->price }} {{ $lot->currency }}</li>
						</ul>
					</div>
				</div>
			</div>						
		@endforeach
	@else
		<div class="col-md-12">
			<p>По Вашему запросу ничего не найдено</p>
		</div>
	@endif
</div>