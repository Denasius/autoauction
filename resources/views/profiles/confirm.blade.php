@extends('layout')

@section('seo')
    <title>{{ $meta_title }}</title>
    <meta name="description" content="{{ $meta_description }}">
@endsection

@section('content')

	<section class="single-blog-profile">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<div class="image_steps">
						<a href="{{ route('profile') }}">
							<div class="item">
								<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/input_data.png') }}" alt="image">
								<div class="radio">
									<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/elipse_3.png') }}" alt="image">
									<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/vector.png') }}" alt="image">
								</div>
							</div>
						</a>
						
						<a href="{{ route('profile.info') }}">
							<div class="item">
								<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/upload_doc_2.png') }}" alt="image">
								<div class="radio">
									<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/elipse_3.png') }}" alt="image">
									<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/vector.png') }}" alt="image">
								</div>
								
							</div>
						</a>
						
						<a href="">
							<div class="item">
								<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/buy_auto_success.png') }}" alt="image">
								<div class="radio">
	                                <img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/elipse_3.png') }}" alt="image">
									<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/vector.png') }}" alt="image">
	                            </div>
							</div>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section>

	@if( session('finish_registration') )
	<section class="container">
		<div class="row">
			<div class="alert alert-success">
				{{ session('finish_registration') }}
			</div>
		</div>
	</section>
	@endif

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="{{ url('aukciony') }}" class="btn btn-success btn-route">Перейти к аукционам</a>
			</div>
		</div>
	</div>

@endsection