$(document).ready(function() {
	$(".knob").knob({
      'draw': function() {
        $(this.i).val(this.cv + '%')
      }
    });

	$("#owl-slider").owlCarousel({
	  navigation: true,
	  slideSpeed: 300,
	  paginationSpeed: 400,
	  singleItem: true

	});

	$('select.styled').customSelect();

	$('button[data-attr="delete"]').on('click',function () {
		return confirm('Вы уверены? Данное действие необратимо.');
	});

	// $('#reservation').daterangepicker();

	 // Tags Input
    // $(".tagsinput").tagsInput();

    // Switch
    //$("[data-toggle='switch']").wrap('<div class="switch" />').parent().bootstrapSwitch();

	// $('#map').vectorMap({
	 //      map: 'world_mill_en',
	 //      series: {
	 //        regions: [{
	 //          values: gdpData,
	 //          scale: ['#000', '#000'],
	 //          normalizeFunction: 'polynomial'
	 //        }]
	 //      },
	 //      backgroundColor: '#eef3f7',
	 //      onLabelShow: function(e, el, code) {
	 //        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
	 //      }
	 //    });

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