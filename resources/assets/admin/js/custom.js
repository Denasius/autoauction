$(document).ready(function() {
	$('.show_next').click(function () {

		$(this).next().toggle();
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