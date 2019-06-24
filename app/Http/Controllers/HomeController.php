<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $data['attr'] = Setting::where('tab', 1)->get();
        //dd($data['attr']);
        return view('home.index', $data);
    }
}
