<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lot;
use App]Setting;

class LotController extends Controller
{
    public function index($model, $routes)
    {
    	$data['lot'] = Lot::find($model->id);
    	$data['slider'] = Setting::all();
    	dd($data['slider']);
    	return view('lots.index', $data);
    }
}
