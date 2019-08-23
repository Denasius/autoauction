@extends('layout')

@section('seo')
    <title>{{ $meta_title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    {!! Html::style('js/dropzone/dropzone.css') !!}
@endsection

@section('content')

	<section class="single-blog-profile">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<div class="image_steps">
						<a href="@if( $user->confirm_register == null ) {{ route('profile') }} @else javascript:void(0) @endif">
							<div class="item">
								<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/input_data.png') }}" alt="image">
								<div class="radio">
									<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/elipse_3.png') }}" alt="image">
									<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/vector.png') }}" alt="image">
								</div>
							</div>
						</a>
						
						<a href="@if( $user->confirm_register == null ) {{ route('profile.info') }} @else javascript:void(0) @endif">
							<div class="item">
								<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/upload_doc_2.png') }}" alt="image">
								<div class="radio">
	                                <img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/elipce_1.png') }}" alt="image">
	                                <img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/elipse_2.png') }}" alt="image">
	                            </div>
							</div>
						</a>
						
						<a href="javascript:void(0)">
							<div class="item">
								<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/buy_auto.png') }}" alt="image">
								<div class="radio">
									<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('img/elipce_1.png') }}" alt="image">
								</div>
							</div>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section>

	@if( session('finish_reg') )
	<section class="container">
		<div class="row">
			<div class="alert alert-warning">
				{{ session('finish_reg') }}
			</div>
		</div>
	</section>
	@endif

	@if( $images->isNotEmpty() )
		<section class="profile-images">
			<div class="container">
				<div class="row">
					<div class="col-md-12 user__images">
						@foreach ($images as $img)
							<div class="item">
								<a data-fancybox="gallery" href="{{ asset('uploads/docs/' . $img->image_src) }}">
									<img class="lazyloading" src="{{ asset('img/th.jpg') }}" data-src="{{ asset('uploads/docs/' . $img->image_src) }}" alt="image">
								</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>	
	@endif

	<section class="profiles profiles-info">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="upload_datas">Добавьте фото документов( скан паспорта, фотография с паспортом в руках)</p>
					<form id="dropzone-register" role="form" action="{{ route('profile.info.save') }}" enctype="multipart/form-data" method="post" class="dropzone">
						@csrf
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form class="confirm-registration" method="post" action="{{ route('profile.confirm') }}" role="form">
						@csrf
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
						<button id="confirm-registration-btn" type="submit">Завершить регистрацию</button>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('scripts_field')
	{!! Html::script('js/dropzone/dropzone.js') !!}
	<script type="text/javascript">
		(function ($) {
			var successUploads = function () {
				Dropzone.options.dropzoneRegister = {
					success: function (response) {
						if( response.status == 'success' ){
							$('#confirm-registration-btn').css({
								'display' : 'block',
								'visibility' : 'visible'
							});
						}
					}
				}
			}

			$(document).ready(function () {
				successUploads();
			});
		})(jQuery)
	</script>
@endsection