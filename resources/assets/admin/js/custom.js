$(document).ready(function() {
	$('.show_next').click(function () {

		$(this).next().toggle();
	});

	if ( $('#car_from_europe').is(':checked') ) {
		$('.form-group-europe').fadeIn();
	}else{
		$('.form-group-europe').fadeOut();
	}
		
	$('.switch ').on('click', function () {
		if ( $('#car_from_europe').is(':checked') ) {
			$('.form-group-europe').fadeIn();
		}else{
			$('.form-group-europe').fadeOut();
		}
	});
	
});

function readURL(input) {

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$(input).parent().prev().attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
}

$(".preview_img").change(function(){
	readURL(this);
});


//Поиск скрываем на клик в любое место
$(document).mouseup(function (e){ // событие клика по веб-документу
	var div = $("#search_result .results"); // тут указываем ID элемента
	if (!div.is(e.target) // если клик был не по нашему блоку
		&& div.has(e.target).length === 0) { // и не по его дочерним элементам
		div.hide(); // скрываем его
	}
});
//Сам поиск
$('#search_form').submit(function () {
	var data = $(this).serialize();
	$.ajax({
		url: '/admin/search',
		type: "POST",
		data: data,
		success: function (data) {
			$('#search_result').html(data);
		}
	});
	return false;
});

$('#search_form .form-control').on('input',function () {
	var data = $('#search_form').serialize();
	if ($(this).val()) {
		$.ajax({
			url: '/admin/search',
			type: "POST",
			data: data,
			success: function (data) {
				$('#search_result').html(data);
			}
		});
	}
	return false;

});

// jQuery.datetimepicker.setLocale('ru');

// $('[name="lot_start"]').datetimepicker({
// 	format: 'Y-m-d H:i:s'
// });

// $('[name="lot_time"]').datetimepicker({
//     format: 'y-m-d H:i:s'
// });

$('input[name="lot_start"]').mask('0000-00-00', {placeholder: '2000-12-30'});
$('input[name="lot_time"]').mask('0000-00-00 00:00:00', {placeholder: '2000-12-30 00:00:00'});