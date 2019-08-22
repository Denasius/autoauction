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
					<h4>Таможенный калькулятор</h4>
					<p>Заполните пожалуйста необходимые поля, чтобы увидеть сумму</p>
				</div>
				<div class="col-md-12">
					
					<div class="vin-panel vin-panel-box">
					<table class="vin-table vin-table-condensed">
						<tbody class="calc-inputs_datas">
						<tr>
							<th align="right">Объем двигателя:</th>
							<td><input id="calc_vol" size="4" value="" type="text" class="vin-input vin-form-width-small" placeholder="см3"></td>
						</tr>
						<tr>
							<th align="right">Стоимость автомобиля:</th>
							<td><input id="calc_cost" size="4" value="" type="text" class="vin-input vin-form-width-small" placeholder="евро"> </td>
						</tr>
						<tr>
							<th align="right">Авто растамаживает:</th>
							<td>
							  <select id="main_calc" class="vin-form-width-small">
							  <option value="0" selected="selected">Физлицо</option>
							  <option value="1">Юрлицо</option>
							  </select>
							</td>
						</tr>
					<tr id="discount">
							<th align="right">Льготы 50%:</th>
							<td>
							 <label for="calc_discount"><input class="vin-radio" id="calc_discount" name="discount" type="checkbox"> Многодетная семья или инвалид I/II группы</label>
							</td>
						</tr>
						<tr>
						</tr><tr id="calc_motor" style="display: none;">
							<th align="right">Тип двигателя:</th>
							<td>
							  <label for="calc_petrol"><input class="vin-radio" id="calc_petrol" name="motor" type="radio" value="1" checked="checked"> Бензиновый</label><br>
							  <label for="calc_diesel"><input class="vin-radio" id="calc_diesel" name="motor" type="radio" value="2"> Дизельный</label>
							</td>
						</tr>
						<tr>
							<th id="offer" align="right">Возраст автомобиля:</th>
							<td>
							 <select id="calc_age" class="vin-form-width-small">
							   <option value="0">менее 3-х лет</option>
							   <option value="1" selected="selected">от 3-х до 5 лет</option>
							   <option value="2">более 5 лет</option>
							 </select>
							</td>
						</tr>

							<tr class="calc-inputs_res"><td colspan="2" align="center"><input id="calc_btn" class="vin-button vin-button-primary" value="Рассчитать пошлину" type="button"></td>
						</tr>
						
					</tbody></table>
					
						<table class="calc_res" style="padding: 27px;">
						<tr id="calc_rezult" style="display: none;">
							<td align="right">
							<span id="calc_tax_txt"></span>
							<span id="calc_vat_txt"></span>
							<span id="calc_total_txt"></span>
							</td>
							<td align="left">
							<span id="calc_tax"></span>
							<span id="calc_vat"></span>
							<span id="calc_total"></span>
							</td>
						</tr>
					</table>
					
					
					</div>
				</div>
			</div>
			<div class="description-calcuator">
				{!! $description !!}
			</div>
			<div class="row table-content">
				<div class="col-md-12 table-pricing">
					@include('layouts._calculate_table')
				   
				</div>
			</div>
		</div>
	</section>

@endsection
