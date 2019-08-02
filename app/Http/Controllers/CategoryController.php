<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use App\Category;
use App\Aliase;

class CategoryController extends Controller
{
    public function index($model, $routes)
    {
    	$data['category'] = Category::where('template', $model->template)->first(); 
    	$data['categories'] = Pages::where('category_id', $data['category']->id)->paginate(9);
    	
    	//dd($data['categories']);  	
    	return view('categories.' . $model->template, $data);
    }
}
