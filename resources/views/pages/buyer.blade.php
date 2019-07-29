@extends('layout')

@section('seo')
  <title>{{ $page->meta_title }}</title>
  <meta name="description" content="{{ $page->meta_description }}">
@endsection

@section('content')

	<div id="page-heading" class="lazyloading" data-src="{{ asset('uploads/' . $page->image) }}" style="background-image: url({{ asset('img/th.jpg') }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>{{ $page->title }}</h1>
					<div class="line"></div>
					<span>{!! $page->getFormatString($page->short_descr, 200) !!}</span>
					<div class="page-active">
						<ul>
							<li><a href="">Главная</a></li>
							<li><i class="fas fa-circle"></i></li>
							<li><a href="javascript:void(0)">{{ $page->title }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="listing-grid seller-template">
		<div class="container">
			<div class="row seller-page-template">
				
				{!! $description !!}
				
			</div>
		</div>
	</section>

@endsection