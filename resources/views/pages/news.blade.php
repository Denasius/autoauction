@extends('layout')

@section('seo')
  <title>{{$page->meta_title}}</title>
  <meta name="description" content="{{ $page->meta_description }}">
@endsection

@section('content')

	@include('layouts._breadcrumbs_pages')
	<section class="single-blog">
		@if(session('success_comment'))
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-success alert-success_comment">
							<ul>
								<li>{{ session('success_comment') }}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		@endif
		<div class="container">
			<div class="row">
				<div id="blog-post" class="col-md-8">
					<div class="blog-item">
						
						<div class="down-content">
							<div class="post-info">
								<ul>
									<li>{{ $page->getFormatDate( $page->created_at ) }}</li>
								</ul>
								<div class="tittle">
									<h2>{{ $page->title }}</h2>
								</div>
							</div>
							{!! $page->descr !!}
						</div>
					</div>
					@if ($page->comments->isNotEmpty())
						<div class="comments">
							@foreach($page->getComments() as $comment)
								<div class="comment-item">
									<h4>{{$page->getAuthorById($comment->user_id)}}</h4>
									<span><i class="fa fa-clock-o"></i>{{$comment->created_at->diffForHumans()}}</span>
									<p>{{$comment->descr}}</p>
								</div>
							@endforeach
						</div>
					@endif
					@if (Auth::check())
						@if ($errors->any())   
			        		<div class="alert alert-danger alert-danger_comment">
			          			<ul>
			            			@foreach( $errors->all() as $error )
			              				<li>{{$error}}</li>
			            			@endforeach
			          			</ul>
			        		</div>
						@endif 

						@include('layouts._comment')
					@endif
				</div>
				<div id="side-bar" class="col-md-4">
					<div class="sidebar-widget categories">
						<h4>Категория</h4>
						<ul>
							<li>{{ $page_category }}</li>
						</ul>
					</div>
					@if( $news_pages->count() >= 1 )
						<div class="sidebar-widget latest-posts">
							<h4>Последние новости</h4>
							@foreach ($news_pages as $news_item)
								<div class="latest-item">
									<img class="lazyloading thumb__news" data-src="{{ asset('uploads/' . $news_item->image ) }}" src="{{ asset('img/th.jpg') }}" alt="{{ $news_item->title }}">
									<a href="{{ asset($news_item->getAliaseForNews($news_item->id)) }}"><h6>{{ $news_item->title }}</h6></a>
									<ul>
										<li><i class="fa fa-calendar"></i>{{ $news_item->getFormatDate( $news_item->created_at ) }}</li>
										{{-- <li><i class="fa fa-comments-o"></i>2 comments</li> --}}
									</ul>
								</div>
							@endforeach
						</div>
					@endif
				</div>
			</div>
		</div>
	</section>

@endsection