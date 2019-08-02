@extends('layout')

@section('seo')
  <title>{{ $category->meta_title }}</title>
  <meta name="description" content="{{ $category->meta_description }}">
@endsection

@section('content')

	<div id="page-heading" @if( $category->image != null ) class="lazyloading" style="background-image: url({{ asset('img/th.jpg') }})" data-src="{{ asset('uploads/'.$category->image) }}" @endif>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>{{ $category->title }}</h1>
					<div class="line"></div>
					<span>{!! $category->descr !!}</span>
					<div class="page-active">
						<ul>
							<li><a href="">Главная</a></li>
							<li><i class="fas fa-circle"></i></li>
							<li><a href="javascript:void(0)">{{ $category->title }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if( $categories->count() >= 1 )
		<section class="blog-grid">
			<div class="container">
				<div class="row">
					<div id="blog-posts posts-template-{{ $category->template }}">
						@foreach ($categories as $news)
							<div class="blog-item col-md-4">
								<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('uploads/' . $news->image) }}" alt="{{ $news->title }}">
								<div class="down-content">
									<div class="post-info">
										<ul>
											<li>{{ $news->getFormatDate( $news->created_at ) }}</li>
										</ul>
										<div class="tittle">
											<a href="{{ asset( $news->getAliaseForNews($news->id)->slug ) }}"><h2>{{ $news->title }}</h2></a>
										</div>
									</div>
									<p>{{ strip_tags($news->getFormatString($news->descr, 150)) }}</p>
									<a href="{{ asset( $news->getAliaseForNews($news->id)->slug ) }}">Подробнее</a>
								</div>
							</div>
						@endforeach
						<div class="col-md-12 text-center">
							<div class="paginate">
								{{$categories->render()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	@endif

@endsection