@extends('layout')

@section('seo')
  <title>{{$page->meta_title}}</title>
  <meta name="description" content="{{ $page->meta_description }}">
@endsection

@section('content')

	@include('layouts._breadcrumbs_pages')
	<section class="single-blog single-page-{{ $class_css }}">
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					{!! $page->descr !!}
				</div>
			</div>
		</div>
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