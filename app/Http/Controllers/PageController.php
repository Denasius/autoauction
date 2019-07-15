<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;

class PageController extends Controller
{
    public function index($model, $routes)
    {
    	$data['page'] = Pages::where('id', $model->id)->firstOrFail();
    	return view('pages.' . $model->template, $data);
    }

    public function seller_form(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3',
    		'lastname' => 'required|min:3',
    		'city' => 'required',
    		'manufacturer' => 'required',
    		'address' => 'required',
    		'phone' => 'required|min:8',
    		'mail' => 'required|email'
    	], $message);
    }
}
