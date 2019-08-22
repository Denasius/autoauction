<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendMail;
use App\Mail\SendMailPurchaseAuto;
use App\CarBrand;
use App\Aliase;
use App\Category;

class PageController extends Controller
{
	public function index($model, $routes)
	{
		if ( $model->template == 'news' ) {
			$data['news_pages'] = Pages::all()->where('template', 'news')->sortBy('created_at')->take(3);
		}
		$data['page'] = Pages::where('id', $model->id)->firstOrFail();
		$data['brands'] = CarBrand::all()->pluck('title', 'id');

		// Форма на странице Физ лицам
		$form = view('layouts.forms._seller_form', $data);

		// Форма на странице Юр лицам
		$form_legal_person = view('layouts.forms._seller_form_yur_licam', $data);

		// Форма на странице Дилерам
		$form_dealer = view('layouts.forms._seller_form_dileram', $data);

		// Форма срочного выкупа авто
		$form_purchase_car = view('layouts.forms._purchase_car', $data);

		// Форма на странице оценка стоимости авто
		$form_cost_estimate = view('layouts.forms._cost_estimate_form', $data);

		// Форма на странице Доставка из Европы
		$form_europe_shipping = view('layouts.forms._form_europe_shipping', $data);

		$data['description'] = str_replace(['[[seller_form]]', '[[seller_form_yur_licam]]', '[[seller_form_dileram]]', '[[purchase_car_form]]', '[[cost_estimate]]', '[[europe_shipping]]'], [$form, $form_legal_person, $form_dealer, $form_purchase_car, $form_cost_estimate, $form_europe_shipping], $data['page']->descr);
		$slug = Aliase::where('type_id', $data['page']->id)->first()->only('slug');
		$data['class_css'] = $slug['slug'];
		$data['page_category'] = Category::where('id', $data['page']->category_id)->pluck('title')->first();


		return view('pages.' . $model->template, $data);
	}

	public function seller_form(Request $request)
	{
		$field_error = [];
		if ( $request->has('name') ){
			$field_error += [
				'name' => 'min:3',
			];
			$data['name'] = $request->get('name');
		}

		if ( $request->has('lastname') ){
			$field_error += [
				'lastname' => 'required|min:3',
			];
			$data['lastname'] = $request->get('lastname');
		}

		if ( $request->has('city') ){
			$field_error += [
				'city' => 'required',
			];
			$data['city'] = $request->get('city');

		}

		if ( $request->has('manufacturer') ){
			$field_error += [
				'manufacturer' => 'required',
			];
			$data['manufacturer'] = $request->get('manufacturer');
		}

		if ( $request->has('address') ){
			$field_error += [
				'address' => 'required',
			];
			$data['address'] = $request->get('address');
		}

		if ( $request->has('phone') ){
			$field_error += [
				'phone' => 'required|min:8',
			];
			$data['phone'] = $request->get('phone');
		}

		if ( $request->has('district') ){
			$field_error += [
				'district' => 'required',
			];
			$data['district'] = $request->get('district');
		}

		if ( $request->has('postcode') ){
			$field_error += [
				'postcode' => 'required|numeric|min:3',
			];
			$data['postcode'] = $request->get('postcode');
		}

		if ( $request->has('mail') ){
			$field_error += [
				'mail' => 'required|email',
			];
			$data['mail'] = $request->get('mail');
		}

		if ( $request->has('mileage') ){
			$field_error += [
				'mileage' => 'numeric',
			];
			$data['mileage'] = $request->get('mileage');
		}

		if ( $request->has('car_brand') ){
			$field_error += [
				'car_brand' => 'required',
			];
			$data['car_brand'] = $request->get('car_brand');
		}

		if ( $request->has('car_model') ){
			$field_error += [
				'car_model' => 'required',
			];
			$data['car_model'] = $request->get('car_model');
		}

		if ( $request->has('min_price_customer') ){
			$field_error += [
				'min_price_customer' => 'required',
			];
			$data['min_price_customer'] = $request->get('min_price_customer');
		}

		if ( $request->has('type') ){
		   
			$data['type'] = $request->get('type');
		}

		$errors = Validator::make($request->all(), $field_error);

		if ( $errors->fails() ) {
			return response()->json([
				'errors' => $errors->getMessageBag()->toArray()
			]);
		}else{
			
			switch ($request->get('type')) {
				 case 'purchase_car':
					 $to = 'denkostyuk1989@gmail.com';
					\Mail::to($to)->send(new SendMailPurchaseAuto($data));
					 break;

				case 'cost_estimate':
					 $to = 'kdo@webernetic.by';
					\Mail::to($to)->send(new SendMailPurchaseAuto($data));
					 break;

				case 'europe_shipping':
					 $to = 'dostavka@vin.by';
					\Mail::to($to)->send(new SendMailPurchaseAuto($data));
					 break;
				 
				 default:
					$to = 'kdo@webernetic.by';
					\Mail::to($to)->send(new SendMail($data));
					 break;
			 } 
			
			return response()->json([
				'success' => 'Ваше сообщение успешно отправлено!'
			]);
		}
	}

	public function check_by_vin_code(Request $request)
	{
		$postdata = http_build_query(
			array(
					'format' => 'json',
					'data' => $request->get('vincode')
				)
		);
		$opts = array('http' =>
			array(
				'header' => 'Content-Type: application/x-www-form-urlencoded',
				'method' => 'POST',
				'content' => $postdata
			)
		);
		$apiURL = "https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVINValuesBatch/";
		$context = stream_context_create($opts);
		$fp = fopen($apiURL, 'rb', false, $context);
		if(!$fp)
		{
			echo "in first if";
		}
		$response = @stream_get_contents($fp);
		if($response == false)
		{
			echo "in second if";
		}
		echo $response;
	}
}
