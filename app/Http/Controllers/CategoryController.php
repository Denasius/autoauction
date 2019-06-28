<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($model, $routes)
    {
    	return view('categories.index');
    }
}
