jQuery(document).ready(function ($) {
	$('#sub-header .right-info ul li.auth').hover( function() {
		$(this).find('.profile-dropdown').toggleClass('active');
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
		 	value = _this.find('select').val();
		

		return $.ajax({
			headers: {
				'X-CSRF-TOKEN':_token
			},
			type: _method,
			url: _url,
			data: {values: value},
			beforeSend:function () {
				$('.overlay-filter').addClass('active');
				$('.prelod-gif').addClass('active');
			},
			success:function (response) {
				$('.overlay-filter').removeClass('active');
				$('.prelod-gif').removeClass('active');
				$('#featured-cars').find('.row').remove();
				$('#featured-cars').html(response).fadeIn('slow');
			},
			error: function (request, errorStatus, errorThrown) {
                console.log(request);
                console.log(errorStatus);
                console.log(errorThrown);
            }
		});
	});

	$('form.global-search').on('submit', function (e) {
		e.preventDefault();
		var _form = $(this),
			_token = _form.find('input[name="_token"]').val(),
			_method = _form.attr('method'),
			_url = _form.attr('action'),
			_value = _form.serialize();

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
            },
            error: function (request, errorStatus, errorThrown) {
                console.log(request);
                console.log(errorStatus);
                console.log(errorThrown);
            }
		});
	});
});