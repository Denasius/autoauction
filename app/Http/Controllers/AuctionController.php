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
        $data['all_brands'] = Lot::getAllBrands();
        // $data['marks'] = 

        return view('auctions.index', $data);
    }

    public function filter(Request $request)
    {
        $sort_lots = Lot::where('status', 1)->get()->sortBy($request->get('values'));  
        if ($request->ajax()) {
            //return response()->json(['sort_lots'=>$sort_lots->values()->all()]);
            return view('auctions._sort_lots', ['sort_lots' => $sort_lots]);
        }
    }
}
