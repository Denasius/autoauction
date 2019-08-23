<?php

namespace App\Http\Controllers;
use App\Lot;
use App\CarModel;
use App\Category;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuctionController extends Controller
{ 
    const PARENT_CATEGORY = 0;
    private $status;
    public function index($model, $routes)
    {
        switch ($model->template) {
            case 'sold':
                $this->status = 0;
                break;
            
            default:
                $this->status = 1;
                break;
        }
        if ( $model->parent_category == AuctionController::PARENT_CATEGORY ) {
            $data['lots'] = Lot::where('status', $this->status)->paginate(12);
            $data['subcategories'] = true;
            $data['subcategories_list'] = Lot::showSubcategoriesOnAuctionTemlates($model->template);

        }else{
            $data['lots'] = Lot::where('status', $this->status)->where('category_id', $model->id)->paginate(12);
            $data['subcategories'] = false;
        }
        $data['meta_title'] = $model->meta_title;
        $data['title'] = $model->title;
        $data['meta_description'] = $model->meta_description;
        $data['description'] = Category::find($model->id)->only('descr');
        $data['category'] = Lot::getCategoryID($model->template, $model->id);
       
        $data['all_brands'] = Lot::getAllBrands();
        $all_lots = Lot::all();

        $data['lots_year'] = $all_lots->sortBy('date');
        $data['max_price'] = $all_lots->max('price');
        $data['min_price'] = $all_lots->min('price');
        $data['milleage'] = $all_lots->sortBy('car_mileage');
        $data['attr_tree'] = Lot::getAttr(true);

        $data['buy_one_click'] = $all_lots->where('buy_one_click', 'on')->take(1);
        $data['category_image'] = Category::find($model->id)->only('image');

        return view('auctions.index', $data);
    }

    public function sendform(Request $request)
    {
        if ( $request->has('consent') && $request->get('consent') == 'on' ) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2',
                'phone' => 'required|min:7',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            }else{

                $data['name'] = $request->get('email');
                $data['phone'] = $request->get('phone');
                $to = 'kdo@webernetic.by';
                \Mail::to($to)->send(new SendMail($data));
                
                return response()->json([
                    'success' => 'Ваше сообщение успешно отправлено!'
                ]);
            }
        }        
    }

    public function search_filter(Request $request)
    {
        $models = CarModel::where('brand_id', $request->get('values'))->get();
        //print_r($models);
        if ( $request->ajax() ) {
            return view('auctions._global_search_model', ['models' => $models]);
        }
    }

    public function global_search(Request $request)
    {
        $lots = Lot::where('status', 1)->select('lots.*');


        if ( $request->has('category_id') && $request->get('category_id') != null ) {
            $lots->where('category_id', $request->get('category_id'));
        }

        if ( $request->has('car_brend') && $request->get('car_brend') != -1 ) {
            $lots->where('car_brend', $request->get('car_brend'));
        }

        if ( $request->has('car_model') && $request->get('car_model') != -1 ) {
            $lots->where('car_model', $request->get('car_model'));
        }

        if ( $request->has('date') && $request->get('date') != -1 ) {
            $lots->where('date', $request->get('date'));
        }

        if ( $request->has('car_mileage') && $request->get('car_mileage') != -1 ) {
            $lots->where('car_mileage', $request->get('car_mileage'));
        }

        if ( $request->has('price') && $request->get('price') != -1 ) {
            $prices = str_replace(['BYN', ' '], '', explode('-', $request->get('price'), 2));
            $lots->whereBetween('price', [$prices[0], $prices[1]]);
        }

        if ( $request->has('tax') ) {
            $lots->where('tax', $request->get('tax'));
        }

        $checked = [];

        if ($request->has('attributes')) {            
            foreach ( $request->get('attributes') as $attr ) {   
                if ( $attr != -1 ) {                
                    array_push($checked, $attr);
                }         
            }
        }

              
        if ( $checked ) {
            $lots->join('lot_attributes', 'lot_attributes.lot_id', '=', 'lots.id');

            $lots->whereIn('lot_attributes.attr_id', $checked);            
        }

        $lots->groupBy('lots.id');
        
        if ($request->ajax()) {
            if ($request->has('sort') && $request->get('sort') != -1)
                return view('auctions._global_search', ['lots' => $lots->get()->sortBy($request->get('sort'))]);
            
            return view('auctions._global_search', ['lots' => $lots->get()]);
        }
    }

}
