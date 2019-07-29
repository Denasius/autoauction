@extends('layout')

@section('seo')
  <title>{{$page->meta_title}}</title>
  <meta name="description" content="{{ $page->meta_description }}">
@endsection

@section('content')

	<div id="page-heading" @if($page->image != null) class="lazyloading" style="background-image: url( {{ asset('img/th.jpg')  }} );" data-src="{{ asset('uploads/' . $page->image) }}" @endif>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>{{$page->title}}</h1>
					<div class="line"></div>
					<span>{!! $page->short_descr !!}</span>
					<div class="page-active">
						<ul>
							<li><a href="/">Главная</a></li>
						<li><i class="fas fa-circle"></i></li>
						<li><a href="javascript:void(0)">{{ $page->title }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="single-blog single-page-{{ $class_css }}">
		
		{!! $page->descr !!}
	</section>

@endsection

@section('scripts_field')
	<script type="text/javascript">
		(function ($) {
			var addAttrToUl = function () {
				$('section[class*="single-page-"] .questions ul li').each(function (index) {
					var link = $(this).find('a');
					var title = $(this).find('a').text();
					link.attr('data-href', 'href' + index);
				});

				$('section[class*="single-page-"] .answer-block').each(function (index) {
					$(this).attr('id', 'href' + index); 
				});
				
			}

			var scrollToClickedElement = function () {
				$('section[class*="single-page-"] .questions ul li a').on('click', function (e) {
					e.preventDefault();
					var this_element = $(this).data('href');
					$('html, body').animate({
				        scrollTop: $('#' + this_element).offset().top - 110
				    }, 2000);
				});
			}

			$(document).ready(function () {
				addAttrToUl();
				scrollToClickedElement();
			});
		})(jQuery)
	</script>
@endsection