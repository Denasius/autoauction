<?php

namespace App\Http\Controllers;
use App\Lot;
use App\CarModel;

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
        $all_lots = Lot::all();
        $data['lots_year'] = $all_lots->sortBy('date');
        $data['max_price'] = $all_lots->max('price');
        $data['milleage'] = $all_lots->sortBy('car_mileage');
        //dd($data['milleage']);
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

    public function search_filter(Request $request)
    {
        $models = CarModel::where('brand_id', $request->get('values'))->get();
        if ( $request->ajax() ) {
            return view('auctions._global_search_model', ['models' => $models]);
        }
    }
}
