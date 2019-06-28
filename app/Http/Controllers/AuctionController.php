<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index($model, $routes)
    {
    	return view('auctions.index');
    }
}
