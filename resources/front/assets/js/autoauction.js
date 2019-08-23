
jQuery(document).ready(function ($) {
	
	$('#sub-header .right-info ul li.auth').hover( function() {
		$(this).find('.profile-dropdown').toggleClass('active');
	});

	// Маска для телефонов
	$('input[name="phone"]').mask('+375 (00) 000-00-00', {placeholder: '+375 (__) ___-__-__'});

	// Запрещаю переход по пустым ссылкам в меню навишации
	$('.responsive-menu, .main-navigation').on('click','a:not(.showLink, .hideLink)', function (e) {		
		if ( $(this).attr('href') === 'http://' || $(this).attr('href') === 'https://' ) {
				e.preventDefault();
				return false;
			}
	});

	$('.form-general__handler').on('submit', function (e){
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
					
					$form.closest('.gallery').find('.answer').append('<div class="alert alert-danger"><ul class="list-errors">'+nameError+phoneError+'</ul></div>');
					$form.find('[type="submit"]').text('Отправить');
				}else{
					var success = data.success != undefined ? '<li>'+data.success+'</li>' : '';
					$form.closest('.gallery').find('.alert-danger').remove();
					$form.closest('.gallery').find('.answer').append('<div class="alert alert-success"><ul class="list-success">'+success+'</ul></div>');
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

	$('.mark-top-filter').on('change', function () {
		var _this = $(this).closest('form'),
			_token = _this.find('input[name="_token"]').val(),
			_method = _this.attr('method'),
			_url = _this.attr('action'),
			value = $('form.global-search, .mark-top-filter').serialize();

		formHandler(_this, _token, _method, _url, value);
	});

	$('form.global-search').on('submit', function (e) {
		e.preventDefault();
		var _form = $(this),
			_token = _form.find('input[name="_token"]').val(),
			_method = _form.attr('method'),
			_url = _form.attr('action'),
			_value = $('form.global-search, .mark-top-filter').serialize();;

		formHandler(_form, _token, _method, _url, _value);
	});

	// Отправка формы на странице Дилерам
	$('[name="go"]').on('click', function (e) {
		e.preventDefault();

		var _form = $(this).closest('.form'),
			_url = _form.data('action'),
			_method = _form.data('method'),
			_token = $('meta[name="csrf-token"]').attr('content'),
			_data = {
				token: _token,
				name: _form.find('[name="name"]').val(),
				lastname: _form.find('[name="lastname"]').val(),
				city: _form.find('[name="city"]').val(),
				manufacturer: _form.find('[name="manufacturer"]').val(),
				address: _form.find('[name="address"]').val(),
				phone: _form.find('[name="phone"]').val(),
				mail: _form.find('[name="mail"]').val()
			}
		
		sellerForm(_form, _token, _method, _url, _data);
		
	});

	// Отправка формы на вложенных страницах юр лиц
	$('.grids-row-form button[type="submit"]').on('click', function (e) {
		e.preventDefault();
		var _form = $(this).closest('.grids-row-form'),
			_url = _form.data('action'),
			_method = _form.data('method'),
			_token = $('meta[name="csrf-token"]').attr('content'),
			_data = {
				token: _token,
				name: _form.find('[name="name"]').val(),
				lastname: _form.find('[name="lastname"]').val(),
				address: _form.find('[name="address"]').val(),
				manufacturer: _form.find('[name="manufacturer"]').val(),
				city: _form.find('[name="city"]').val(),
				district: _form.find('[name="district"]').val(),
				postcode: _form.find('[name="postcode"]').val(),
				mail: _form.find('[name="mail"]').val(),
				phone: _form.find('[name="phone"]').val(),
			}
		sellerForm(_form, _token, _method, _url, _data);
	});

	// Отправка формы на странице Физ лицам и странице Срочный выкуп авто
	$('form.form-person, .purchase-form').on('submit', function (e) {
		e.preventDefault();
		var _form = $(this),
			_url = _form.attr('action'),
			_method = _form.attr('method'),
			_token = $('meta[name="csrf-token"]').attr('content'),
			_data = _form.serialize();
		sellerForm(_form, _token, _method, _url, _data);
	});


	// Подгружаю страницы по клику на табы на странице лота
	
	$('.car-details .tabs .tab-links li a').on('click', function (e) {
		e.preventDefault();
		var this_form = $(this).closest('ul'),
			form_url = this_form.data('action'),
			form_method = this_form.data('method'),
			form_data = $(this).attr('href'),
			lot_id = this_form.data('lot-id');
			form_token = $('meta[name="csrf-token"]').attr('content');

			return $.ajax({
				headers: {
					'X-CSRF-TOKEN':form_token
				},
				type: form_method,
				url: form_url,
				data: {url: form_data, id: lot_id},
				beforeSend:function () {
					$('.tab-block .loader').addClass('active');
					$('.tab-block .loader > img').addClass('active');
				},
				success:function (response) {
					$('.tab-block .loader').removeClass('active');
					$('.tab-block .loader > img').removeClass('active');
					$('#content > #container').remove();
					$('#content').html(response).hide().fadeIn('fast');
					$('.lazyloading').lazyload();
				},
				error: function (request, errorStatus, errorThrown) {
					console.log(request);
					console.log(errorStatus);
					console.log(errorThrown);
				}
			});
	});

	// Добавляю в избранное лот
	$('.favorite-btn').on('click', function (e) {
		e.preventDefault();
		var this_form = $(this),
			form_url = this_form.data('action'),
			form_method = this_form.data('method'),
			form_token = $('meta[name="csrf-token"]').attr('content'),
			form_user_id = this_form.data('user-id'),
			form_lot_id = this_form.data('lot-id');
		

		return $.ajax({
				headers: {
					'X-CSRF-TOKEN':form_token
				},
				type: form_method,
				url: form_url,
				data: {user_id: form_user_id, lot_id: form_lot_id},
				beforeSend:function () {
					
					
				},
				success:function (response) {
					if ( response == 'add-wishlist' ) {
						this_form.closest('.head-side-bar').find('.to_favorites').css({
							'display' : 'none',
							'visibility' : 'hidden',
							
						});

						this_form.closest('.head-side-bar').find('.remove_favorites').css({
							'display' : 'block',
							'visibility' : 'visible'
						});
					}else{
						console.log(response);
						this_form.closest('.head-side-bar').find('.to_favorites').css({
							'display' : 'block',
							'visibility' : 'visible',
							
						})

						this_form.closest('.head-side-bar').find('.remove_favorites').css({
							'display' : 'none',
							'visibility' : 'hidden'
						});
					}
					
				},
				error: function (request, errorStatus, errorThrown) {
					console.log(request);
					console.log(errorStatus);
					console.log(errorThrown);
				}
			});
	});

	// Обновляю ставки по клику на кнопку
	$('.reload-bet').on('click', function (e) {
		e.preventDefault();
		var this_form = $(this),
			this_action = this_form.data('action'),
			this_method = this_form.data('method'),
			this_lot = this_form.data('lot-id'),
			this_token = $('meta[name="csrf-token"]').attr('content');

		return $.ajax({
			headers: {
				'X-CSRF-TOKEN':this_token
			},
			type: this_method,
			url: this_action,
			data: {lot_id: this_lot},
			beforeSend: function () {
				this_form.hide();
				this_form.next('.reload-gif').addClass('active');
			},
			success: function (response) {
				this_form.show();
				this_form.next('.reload-gif').removeClass('active');
				this_form.closest('.lot-bet').find('.current-bet > .current-bet_price > strong').remove();
				this_form.closest('.lot-bet').find('.current-bet > .current-bet_price').append('<strong>' + response + '</strong>').hide().fadeIn(500);
			},
			error: function (request, errorStatus, errorThrown) {
				console.log(request);
				console.log(errorStatus);
				console.log(errorThrown);
			}
		});
	});

	// Добавляю ставку
	$('form.bet-form [name="go_bet"]').on('click', function (e) {
		e.preventDefault();
		var this_form = $(this).closest('.bet-form'),
			this_action = this_form.attr('action'),
			this_method = this_form.attr('method'),
			this_lot = this_form.data('lot'),
			this_user = this_form.data('user'),
			this_token = $('meta[name="csrf-token"]').attr('content');


		return $.ajax({
			headers: {
				'X-CSRF-TOKEN':this_token
			},
			type: this_method,
			url: this_action,
			data: {lot_id: this_lot, price: this_form.find('input').val(), user_id:this_user },
			beforeSend: function () {
				this_form.find('[name="go_bet"]')	.text('Ожидайте...');
			},
			success: function (response) {
				console.log(response);
				this_form.find('[name="go_bet"]').text('Cделать ставку');
				if( response.errors ){
					var priceError = response.errors.price != undefined ? '<li>'+response.errors.price+'</li>' : '';
					this_form.closest('.max-bet').find('.alert.alert-danger').remove();
					this_form.closest('.max-bet').find('.alert.alert-success').remove();
					this_form.closest('.max-bet').find('.answer').append('<ul class="alert alert-danger">'+ priceError + '</ul>'); 
				}

				if ( response.success ) {
					var success = response.success != undefined ? '<li>'+response.success+'</li>' : '';
					this_form.trigger('reset');
					this_form.closest('.lot-bet').find('.current-bet_price strong').load(window.location.pathname + ' #current-bet_price strong');
					this_form.closest('.max-bet').find('.alert.alert-danger').remove();
					this_form.closest('.max-bet').find('.alert.alert-success').remove();
					this_form.closest('.max-bet').find('.answer').append('<ul class="alert alert-success">'+ success + '</ul>'); 
				}
			},
			error: function (request, errorStatus, errorThrown) {
				console.log(request);
				console.log(errorStatus);
				console.log(errorThrown);
			}
		});
	});

	$('.lazyloading').lazyload();
});


function formHandler(_form, _token, _method, _url, _value) {
	return $.ajax({
		headers: {
			'X-CSRF-TOKEN':_token
		},
		type: _method,
		url: _url,
		data: _value,
		beforeSend:function () {
			$('.overlay-filter').addClass('active');
			$('.prelod-gif').addClass('active');
		},
		success: function (response) {
			$('.overlay-filter').removeClass('active');
			$('.prelod-gif').removeClass('active');
			$('#featured-cars').find('.row').remove();
			$('#featured-cars').html(response).fadeIn('slow');
			$('#lot_counted').text($(response + '#response_lot_count').val());
			$('html, body').animate({ scrollTop: 200 }, 'slow');
		},
		error: function (request, errorStatus, errorThrown) {
			console.log(request);
			console.log(errorStatus);
			console.log(errorThrown);
		}
	});
}

function sellerForm(_form, _token, _method, _url, _data) {
	return $.ajax({
		headers: {
			'X-CSRF-TOKEN':_token
		},
		type: _method,
		url: _url,
		data: _data,
		beforeSend: function () {
			_form.find('button[type="submit"]').text('Отправка...');
		},
		success: function (response) {
			console.log(response);
			_form.find('button[type="submit"]').text('Отправить');
			if( response.errors ){
				var nameError = response.errors.name != undefined ? '<li>'+response.errors.name+'</li>' : '';
				var lastnameError = response.errors.lastname != undefined ? '<li>'+response.errors.lastname+'</li>' : ''; 
				var cityError = response.errors.city != undefined ? '<li>'+response.errors.city+'</li>' : ''; 
				var manufacturerError = response.errors.manufacturer != undefined ? '<li>'+response.errors.manufacturer+'</li>' : ''; 
				var addressError = response.errors.address != undefined ? '<li>'+response.errors.address+'</li>' : ''; 
				var phoneError = response.errors.phone != undefined ? '<li>'+response.errors.phone+'</li>' : ''; 
				var mailError = response.errors.mail != undefined ? '<li>'+response.errors.mail+'</li>' : '';
				var districtError = response.errors.district != undefined ? '<li>'+response.errors.district+'</li>' : '';
				var postcodeError = response.errors.postcode != undefined ? '<li>'+response.errors.postcode+'</li>' : '';
				var mileageError = response.errors.mileage != undefined ? '<li>'+response.errors.mileage+'</li>' : '';
				var carBrandError = response.errors.car_brand != undefined ? '<li>'+response.errors.car_brand+'</li>' : '';
				var carModelError = response.errors.car_model != undefined ? '<li>'+response.errors.car_model+'</li>' : '';
				var carMinPrice = response.errors.min_price_customer != undefined ? '<li>'+response.errors.min_price_customer+'</li>' : '';
				
				_form.find('.alert.alert-danger').remove();
				_form.append('<ul class="alert alert-danger">'+ nameError + lastnameError + cityError + manufacturerError + addressError + phoneError + mailError + postcodeError + districtError + mileageError + carBrandError + carModelError + carMinPrice + '</ul>'); 
			}
			if ( response.success ) {
				_form.trigger('reset');
				_form.find('.alert.alert-danger').remove();
				_form.append('<div class="alert alert-success" style="margin-top: 20px;">Ваше сообщение успешно отправлено.</div>'); 
			}
		},
		error: function (request, errorStatus, errorThrown) {
			console.log(request);
			console.log(errorStatus);
			console.log(errorThrown);
		}
	});
}
