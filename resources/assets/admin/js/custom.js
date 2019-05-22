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