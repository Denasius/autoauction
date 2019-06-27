@extends('layout')

@section('content')

<div id="page-heading">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Результаты поиска</h1>
				<div class="line"></div>
				<div class="page-active">
					<ul>
						<li><a href="/">Главная</a></li>
						<li><i class="fa fa-dot-circle-o"></i></li>
						<li><a href="blog-right.html">{{ request()->input('query') }}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

	<section class="blog-grid">
		<div class="container">
			<div class="row">
				<div id="blog-posts">
					@foreach ($lots as $lot)
						<div class="blog-item col-md-4">
							<div class="img-search">
								<img src="{{ $lot->image }}" alt="{{ $lot->title }}">
							</div>
							<div class="down-content">
								<div class="post-info">
									<ul>
										<li>
											@if ($lot->updated_at)
												{{ $lot->updated_at->format('d/m/Y') }}
											@else
												{{ $lot->created_at->format('d/m/Y') }}
											@endif
										</li>
									</ul>
									<div class="tittle">
										<a href="{{ $lot->slug }}"><h2>{{ $lot->title }}</h2></a>
									</div>
								</div>
								<p>{!! $lot->desr !!}</p>
								<a href="{{ $lot->slug }}">Смотреть</a>
							</div>
						</div>
					@endforeach

					@if( $lots->count() > 1 )
						<div class="col-md-12 text-center">
							<div class="load-more-button">
								<a href="#">Load more</a><i class="fa fa-spinner"></i>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</section>

@endsection