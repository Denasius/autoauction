@extends('layout')

@section('seo')
  <title>{{$page->meta_title}}</title>
  <meta name="description" content="{{ $page->meta_description }}">
@endsection

@section('content')

	@include('layouts._breadcrumbs_pages')

	<section class="who-is">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					{!! $page->descr !!}
				</div>
			</div>
		</div>
	</section>

@endsection