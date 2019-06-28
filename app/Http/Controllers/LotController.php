<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LotController extends Controller
{
    public function index($model, $routes)
    {
    	return view('lots.index');
    }
}
