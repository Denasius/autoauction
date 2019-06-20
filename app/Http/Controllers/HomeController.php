<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;

class HomeController extends Controller
{
    public function index()
    {
        $data['attr'] = Attribute::get_all();
        // dd($data['attr']);
        return view('home.index', $data);
    }
}
