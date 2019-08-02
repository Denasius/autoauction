<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendMail;
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
        $form = view('layouts._seller_form', $data);
        $form_legal_person = view('layouts._seller_form_yur_licam', $data);
        $form_dealer = view('layouts._seller_form_dileram', $data);
        $data['description'] = str_replace(['[[seller_form]]', '[[seller_form_yur_licam]]', '[[seller_form_dileram]]'], [$form, $form_legal_person, $form_dealer], $data['page']->descr);
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
                'name' => 'required|min:3',
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

    	$errors = Validator::make($request->all(), $field_error);

        if ( $errors->fails() ) {
            return response()->json([
                'errors' => $errors->getMessageBag()->toArray()
            ]);
        }else{
                
            $to = 'kdo@webernetic.by';
            \Mail::to($to)->send(new SendMail($data));
            
            return response()->json([
                'success' => 'Ваше сообщение успешно отправлено!'
            ]);
        }
    }
}
