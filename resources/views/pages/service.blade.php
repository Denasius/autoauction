@extends('layout')

@section('seo')
  <title>Услуги</title>
  <meta name="description" content="Услуги">
@endsection


@section('content')

	@include('layouts._breadcrumbs_pages')

	<section class="listing-grid servise-template">
		<div class="container">
			<div class="row servise-page-template">
				
				<div class="col-md-12">
					{!! $description !!}
				</div>
				
			</div>
		</div>
	</section>

@endsection