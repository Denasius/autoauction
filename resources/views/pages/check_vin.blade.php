@extends('layout')

@section('seo')
    <title>{{$page->meta_title}}</title>
    <meta name="description" content="{{ $page->meta_description }}">
@endsection

@section('content')

	@include('layouts._breadcrumbs_pages')
	<section class="single-blog single-page-{{ $class_css }}">
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					{!! $description !!}
				</div>
			</div>
            <div class="row">
                <div class="col-md-12 vin-form" data-method="post" data-action="{{ route('check.vin') }}">
                    @csrf
                    <input type="text" name="check" placeholder="введите VIN" />
                    <button id="check_by_vin">Проверить</button>
                </div>
                <div class="col-md-4">
                    <div id="result-check-vin"></div>
                </div>
            </div>
		</div>
	</section>

@endsection

@section('scripts_field')
<script type="text/javascript">
    (function ($) {
        var checkAvto = function () {
            $('#check_by_vin').on('click', function (e) {
                e.preventDefault();
                var this_form = $(this).closest('.vin-form'),
                    this_method = this_form.data('method'),
                    this_token = this_form.find('input[name="_token"]').val(),
                    this_action = this_form.data('action');
                return $.ajax({
                    headers: {
				        'X-CSRF-TOKEN': this_token
                    },
                    type: this_method,
                    url: this_action,
                    data: { vincode: this_form.find('input[name="check"]').val() },
                    beforeSend: function () {
                        $('.vin-form').find('button').text('Ожидайте...');                        
                    },
                    success: function (result) {
                        $('.vin-form').find('button').text('Проверить');
                        var data = JSON.parse(result);                
                        if (data.Count == 0) {
                            //console.log(data);
                            $('#result-check-vin').find('.answer').remove();
                            $('#result-check-vin').append('<div class="answer" style="color: red; font-family: Roboto, sans-serif; font-size: 16px;">Данные отсутствуют</div>');
                        } else {
                            //console.log(data.Results[0]);
                            var typeFuel = '';
                            if (data.Results[0].FuelTypePrimary === 'Gasoline') {
                                typeFuel = 'Бензин';
                            }

                            if (data.Results[0].FuelTypePrimary === 'Diesel') {
                                typeFuel = 'Дизель';
                            }
                            $('#result-check-vin').find('.answer').remove();
                            $('#result-check-vin').append('<div class="answer answer-success">' +
                                '<span>Марка: ' + data.Results[0].Make + '</span><br />' +
                                '<span>Модель: '+ data.Results[0].Model + '</span><br />' +
                                '<span>Тип кузова: '+ data.Results[0].Trim + '</span><br />' +
                                '<span>Модельный год: '+ data.Results[0].ModelYear + '</span><br />' +
                                '<span>Производитель двигателя: '+ data.Results[0].EngineManufacturer + '</span><br />' +
                                '<span>Тип топлива: '+ typeFuel + '</span><br />' +
                                '<span>Модель двигателя: '+ data.Results[0].EngineModel + '</span><br />' +
                            '</div>');
                        }
                        
                    }
                });
            });
        }

        $(document).ready(function () {
            checkAvto();
        });
    })(jQuery)
</script>
@endsection
