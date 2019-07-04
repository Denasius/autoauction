<div class="row">
	@foreach ($sort_lots as $lot)
		<div class="featured-item col-md-4">
			<div class="lot-image">
				<img src="{{ $lot->image }}" alt="{{ $lot->title }}">
			</div>
			<div class="down-content">
				<a href="{{ $lot->slug }}"><h2>{{ $lot->title }}</h2></a>
				<span>52,000</span>
				<div class="light-line"></div>
				<p>{{ strip_tags( $lot->getFormatString($lot->desr, 60) ) }}</p>
				<div class="car-info">
					<ul>
						<li><i class="icon-gaspump"></i>{{ $lot->fuel }}</li>
						<li><i class="icon-car"></i>{{ $lot->car_model }}</li>
						<li><i class="icon-road2"></i>12,000</li>
					</ul>
				</div>
			</div>
		</div>						
	@endforeach
</div>