{{-- кастыль! позже сделаю нормально --}}
<input type="hidden" id="response_lot_count" value="{{ $lots->count() }}">
<div class="row">
	@if( $lots->count() > 0 )

		@foreach ($lots as $lot)
			<div class="featured-item col-md-4">
				<div class="lot-image">
					<img src="{{ url($lot->image) }}" alt="{{ $lot->title }}">
				</div>
				<div class="down-content">
					<a href="{{ $lot->slug }}"><h2>{{ $lot->title }}</h2></a>
					<span>{{ number_format($lot->price, 0) }} {{ $lot->currency }}</span>
					<div class="light-line"></div>
					<p>{{ strip_tags( $lot->getFormatString($lot->desr, 60) ) }}</p>
					<div class="car-info">
						<ul>
							<li><i class="icon-gaspump"></i>{{ $lot->fuel }}</li>
							<li><i class="icon-car"></i>{{ $lot->car_model }}</li>
							<li><i class="icon-road2"></i>{{ $lot->car_mileage }}</li>
						</ul>
					</div>
				</div>
			</div>						
		@endforeach
	@else
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
</div>
<script type="text/javascript">
	(function ($) {
		var makeButtonDisable = function () {
			$('form.form-result-searching .field-checkbox input[type="checkbox"], form.form-result-searching .field-checkbox label').on('click', function () {
				if ( $('form.form-result-searching .field-checkbox input[type="checkbox"]').is(':checked') ) {
					$('form.form-result-searching .fields button').prop('disabled', false);
				}else{
					$('form.form-result-searching .fields button').prop('disabled', true);
				}
			});
		}

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
			});
		}

		$(document).ready(function () {
			makeButtonDisable();
			chexkInput();
			sendForm();
		});
	})(jQuery)
</script>