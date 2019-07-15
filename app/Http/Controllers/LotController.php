<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lot;

class LotController extends Controller
{
    public function index($model, $routes)
    {
    	$data['lot'] = Lot::find($model->id);
    	return view('lots.index', $data);
    }
}
