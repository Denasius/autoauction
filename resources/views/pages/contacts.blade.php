@extends('layout')

@section('seo')
  <title>{{$page->meta_title}}</title>
  <meta name="description" content="{{ $page->meta_description }}">
@endsection

@section('content')

	@include('layouts._breadcrumbs_pages')

	<div class="contact-form">
		<div class="container page-contacts">
			<div class="row">
				<div class="col-md-12">
					{!! $page->descr !!}
				</div>
			</div>
		</div>
	</div>

@endsection