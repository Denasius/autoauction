@extends('layout')

@section('seo')
  <title>{{ $page->meta_title }}</title>
  <meta name="description" content="{{ $page->meta_description }}">
@endsection


@section('content')

	<div id="page-heading" style="background-image: url(uploads/{{$page->image}});">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>{{ $page->title }}</h1>
					<div class="line"></div>
					<span>{!! $page->getFormatString($page->short_descr, 200) !!}</span>
					<div class="btn">
						<a href="javascript:void(0)">Продать быстро</a>
					</div>
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
				
				{!! $page->descr !!}
				
			</div>
		</div>
	</section>

@endsection