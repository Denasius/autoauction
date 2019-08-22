@extends('layout')

@section('seo')
  <title>{{ $page->meta_title }}</title>
  <meta name="description" content="{{ $page->meta_description }}">
@endsection


@section('content')

	@include('layouts._breadcrumbs_pages')

	<section class="listing-grid seller-template">
		<div class="container">
			<div class="row seller-page-template">
				
				<div class="col-xs-12">
					{!! $description !!}
				</div>
				
			</div>
		</div>
	</section>

@endsection