@extends('layout')

@section('seo')
  <title>Результаты поиска</title>
  <meta name="description" content="Результаты поиска">
@endsection

@section('content')

<div id="page-heading" class="lazyloading" style="background-image: url( {{ asset('img/th.jpg')  }} );padding-top:145px;" data-src="{{ asset('assets/images/search.jpg') }}">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="searching-result-title">Результаты поиска</h1>
				<div class="line"></div>
				<div class="page-active">
					<ul>
						<li><a href="/">Главная</a></li>
						<li><i class="fa fa-dot-circle-o"></i></li>
						<li><a href="blog-right.html">{{ request()->input('query') }}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

	<section class="blog-grid">
		<div class="container">
			<div class="row">
				<div id="blog-posts">
					@if( $lots->isNotEmpty() )
					{{-- Если что то нашли, то показываю --}}
						@foreach ($lots as $lot)
							<div class="blog-item col-md-4">
								<div class="img-search">
									<img src="{{ $lot->image }}" alt="{{ $lot->title }}">
								</div>
								<div class="down-content">
									<div class="post-info">
										<ul>
											<li>
												@if ($lot->updated_at)
													{{ $lot->updated_at->format('d/m/Y') }}
												@else
													{{ $lot->created_at->format('d/m/Y') }}
												@endif
											</li>
										</ul>
										<div class="tittle">
											<a href="{{ $lot->slug }}"><h2>{{ $lot->title }}</h2></a>
										</div>
									</div>
									<p>{{ $lot->getFormatStringWithoutHtml( $lot->desr, 200 ) }}</p>
									<a href="{{ $lot->slug }}">Смотреть</a>
								</div>
							</div>
						@endforeach

						{{-- Пагинацию пока что не вывожу
							@if( $lots->count() > 1 )
							<div class="col-md-12 text-center">
								<div class="load-more-button">
									<a href="#">Load more</a><i class="fa fa-spinner"></i>
								</div>
							</div>
						@endif --}}
					@else 
					{{-- Если ничего не нашли, вывожу форму --}}
					<div class="col-md-12 form-not-founded">
						<p class="not_found">Не нашли подходящее авто?</p>
						<span>Оставте номер телефона и наш менеджер свяжется с Вами</span>
			
						<form class="form-result-searching" action="/sendform" method="POST">
							@csrf
							<div class="fields">
								<input type="text" name="name" placeholder="Ваше имя">
								<input type="text" name="phone" placeholder="Ваш телефон">
								<button type="submit">Отправить</button>
							</div>
							<div class="field-checkbox">
								<label for="consent">Согласен на обработку персональных данных</label>
								<input type="checkbox" name="consent" id="consent" checked>
							</div>
						</form>
						<div class="answer"></div>
					</div>
					@endif
				</div> {{-- Конец #blog-posts --}}
			</div>
		</div>
	</section>
	
	@endsection

	@section('scripts_field')
	<script type="text/javascript">
		(function ($) {
	
			var chexkInput = function () {
				if ( $('form.form-result-searching .field-checkbox input[type="checkbox"]').is(':checked') ) {
					$('form.form-result-searching .fields button').prop('disabled', false);
				}else{
					$('form.form-result-searching .fields button').prop('disabled', true);
				}
			}
	
			var sendForm = function () {
				$('.form-result-searching').on('submit', function (e) {
					e.preventDefault();
					var $form = $(this),
						method = $form.attr('method'),
						_url = $form.attr('action'),
						_token = $form.find('input[name="_token"]').val();
	
					// Если чекбокс не выбран, то вывожу alert с текстом подвердить согласие на обработку персональных данных
					if ( $('form.form-result-searching .field-checkbox input[type="checkbox"]').is(':checked') ) {
						return $.ajax({
							headers: {
								'X-CSRF-TOKEN':_token
							},
							type: method,
							url: _url,
							data: $form.serialize(),
							beforeSend:function () {
								$form.find('[type="submit"]').text('Отправка...');
							},
							success: function (data) {
								if ( data.errors ) {
									var nameError = data.errors.name != undefined ? '<li>'+data.errors.name+'</li>' : '';
									var phoneError = data.errors.phone != undefined ? '<li>'+data.errors.phone+'</li>' : ''; 
									
									$form.closest('.form-not-founded').find('.answer').append('<div class="alert alert-danger"><ul class="list-errors">'+nameError+phoneError+'</ul></div>');
									$form.find('[type="submit"]').text('Отправить');
								}else{
									var success = data.success != undefined ? '<li>'+data.success+'</li>' : '';
									$form.closest('.form-not-founded').find('.alert-danger').remove();
									$form.closest('.form-not-founded').find('.answer').append('<div class="alert alert-success"><ul class="list-success">'+success+'</ul></div>');
									$form.find('[type="submit"]').text('Отправить');
								}
							},
							error: function (request, errorStatus, errorThrown) {
												console.log(request);
												console.log(errorStatus);
												console.log(errorThrown);
										}
						});
					}else{
						alert('Подвердите Ваше согласие на обработку персональных данных!');
					}
				});
			}
	
			$(document).ready(function () {
				chexkInput();
				sendForm();
			});
		})(jQuery)
	</script>
	@endsection