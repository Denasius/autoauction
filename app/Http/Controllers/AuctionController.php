<?php

namespace App\Http\Controllers;
use App\Lot;

use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index($model, $routes)
    {
    	$data['meta_title'] = $model->meta_title;
    	$data['title'] = $model->title;
    	$data['meta_description'] = $model->meta_description;
    	$data['description'] = $model->description;
    	$data['lots'] = Lot::where('status', 1)->paginate(12);
    	//dd($data['lots']);
    	return view('auctions.index', $data);
    }

    public function filter()
    {
    	dd(123);
    }
}
