<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lot;
use App\LotImage;
use App\Attribute;
use App\LotAttributes;
use App\AttributeCategory;
use Illuminate\Support\Facades\DB;
use \Cookie;


class LotController extends Controller
{
    public function index($model, $routes)
    {
    	$data['lot'] = Lot::find($model->id);
    	$data['lot_images'] = LotImage::where('lot_id', $data['lot']->id)->take(5)->get();
    	$data['lot_attribute'] = $this->getLotsAttributes($model->id);
    	$data['general_attrs'] = $this->getMainAttributes($model->id);
    	$data['additional_attrs'] = $this->getAdditionalAttributes($model->id);
        $cookie_data = json_decode(Cookie::get('favorite'));
        $data['cookies'] = [];
        if ($cookie_data != null){
            //array_unshift($data['cookies'], $cookie_data->lots);
            $data['cookies'] = $cookie_data->lots;
        }
    	//dd($data['cookies']);
    	
    	return view('lots.index', $data);
    }

    public function change_page(Request $request)
    {
    	if ( $request->ajax() ) {
            
            switch ($request->get('url')) {
            	case 'main':
            		$data['general_attrs'] = $this->getMainAttributes($request->get('id'));
    				$data['additional_attrs'] = $this->getAdditionalAttributes($request->get('id'));
            		return view('lots.layouts._main', $data);
            		break;

            	case 'description':
            		$data['lot'] = Lot::find($request->get('id'));
            		return view('lots.layouts._description_layout', $data);
            		break;

            	case 'images':
            		$data['thumbnails'] = LotImage::where('lot_id', $request->get('id'))->get();
            		return view('lots.layouts._images_layout', $data);
            		break;
            	
            	default:
            		$data['general_attrs'] = $this->getMainAttributes($model->id);
    				$data['additional_attrs'] = $this->getAdditionalAttributes($model->id);
            		return view('lots.layouts._main', $data);
            		break;
            }
        }
    }

    public function getLotsAttributes($id)
    {
    	$data['lot_attr'] = [];
    	$results = LotAttributes::where(['lot_id'=> $id])->get();
    	if ($results) {
            foreach ($results as $result) {
                array_push($data['lot_attr'],$result->attr_id);
            }
        }

        return $data['lot_attr'];
    }

    public function getMainAttributes($id)
    {
    	$data['attrs'] = [];
        // 0 - оснвные атрибуты
        $results = AttributeCategory::where(['type'=> 0])->get();
        foreach ($results as $result) {
        	$items = DB::table('lot_attributes')
        			->join('attributes', 'lot_attributes.attr_id', '=', 'attributes.id' )
        			->join('lots', 'lot_attributes.lot_id', '=', 'lots.id')
        			->where('attributes.category_id', $result->id)
        			->where('lot_attributes.lot_id', $id)
        			->select('attributes.title')
        			->get();

            $data['attrs'][] = [
                'id'    => $result->id,
                'title' => $result->title,
                'items' => $items,
            ];
        }

        return $data['attrs'];
    }

    public function getAdditionalAttributes($id)
    {
    	$data['attrs_dop'] = [];
        // 1 - дополнительные атрибуты
        $results = AttributeCategory::where(['type'=> 1])->get();
        foreach ($results as $result) {
        	$items = DB::table('lot_attributes')
        			->join('attributes', 'lot_attributes.attr_id', '=', 'attributes.id' )
        			->join('lots', 'lot_attributes.lot_id', '=', 'lots.id')
        			->where('attributes.category_id', $result->id)
        			->where('lot_attributes.lot_id', $id)
        			->select('attributes.title')
        			->get();

            $data['attrs_dop'][] = [
                'id'    => $result->id,
                'title' => $result->title,
                'items' => $items,
            ];
        }

        return $data['attrs_dop'];
    }
}
