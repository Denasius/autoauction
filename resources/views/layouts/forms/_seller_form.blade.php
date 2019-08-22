<div class="col-md-12 block_with_form">
	<form action="{{ route('seller-form') }}" method="POST" class="form-person">
		<div class="block">
	      	<label for="name"><span>Имя</span>
	      	<input type="text" name="name" id="name"></label>
	        <label for="lastname"><span>Фамилия</span>
	      	<input type="text" name="lastname" id="lastname"></label>
	    </div>

	    <div class="block">
	      	<label for="city"><span>Город</span>
	      	<input type="text" name="city" id="city"></label>
	        <label for="mileage"><span>Пробег</span>
	      	<input type="text" name="mileage" id="mileage"></label>
	    </div>

	    <div class="block">
	      	
      		<label for="car_brand"><span>Марка</span>
		      	<select name="car_brand" id="car_brand">
		      		<option value="-1">Выберите марку</option>
		      		@foreach ($brands as $key => $value)
		      			<option value="{{ $key }}">{{ $value }}</option>
		      		@endforeach
		      		
		      	</select>
		    </label>
		    <label for="car_model"><span>Модель</span>
		      	<select name="car_model" id="car_model">
		      		<option value="-1">Выберите модель</option>
		      				      		
		      	</select>
		    </label>

      	
      		<label for="defect"><span>Наличие повреждений</span>
		      	<input type="checkbox" name="defect" id="defect">
		    </label>
		    <label for="credit"><span>Наличие кредита на авто</span>
		      	<input type="checkbox" name="credit" id="credit">
		    </label>
	      	
	    </div>
	    <div class="block">
	      	<label for="email"><span>Почта</span>
	      	<input type="text" name="email" id="email"></label>
	        <label for="phone"><span>Телефон</span>
	      	<input type="text" name="phone" id="phone"></label>
	    </div>
	    <button type="submit">Отправить</button>
	</form>
</div>
{{-- Изменяю модификацию авто в соответствии с выбранной моделью --}}
<script type="text/javascript">
	(function ($) {

		var getCarsModels = function () {
			$('#car_brand').on('change', function () {				
				var _this = $(this),
					_token = $('meta[name="csrf-token"]').attr('content'),
				 	_method = 'POST',
				 	_url = "{{ route('search-filter') }}",
				 	_value = {
				 		values: _this.val()
			 	}

			 	return $.ajax({
					headers: {
			            'X-CSRF-TOKEN':_token
			        },
			        type: _method,
			        url: _url,
			        data: _value,
			        success: function (response) {
			        	$('#car_model').find('option:not(:first-child)').remove();
			        	$('#car_model').append(response);
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
			getCarsModels();
		});
	})(jQuery)
</script>