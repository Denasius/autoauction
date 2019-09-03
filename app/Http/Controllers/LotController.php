<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lot;
use App\LotImage;
use App\Attribute;
use App\LotAttributes;
use App\Setting;
use App\AttributeCategory;
use Illuminate\Support\Facades\DB;
use \Cookie;
use Illuminate\Support\Facades\Validator;
use App\Bet;
use Illuminate\Support\Facades\Auth;
use App\Mail\LotOrderSuccess;
use App\Mail\LotOrderSuccessAdmin;


class LotController extends Controller
{
    public function index($model, $routes)
    {
    	$data['lot'] = Lot::find($model->id); 
        //dd($data['lot']->lot_bet);      
    	$data['lot_images'] = LotImage::where('lot_id', $data['lot']->id)->take(5)->get();
    	$data['lot_attribute'] = $this->getLotsAttributes($model->id);
    	$data['general_attrs'] = $this->getMainAttributes($model->id);
    	$data['additional_attrs'] = $this->getAdditionalAttributes($model->id);
        $data['active_lots'] = Lot::where('status', 1)->take(4)->inRandomOrder()->get();
        $data['lot_is_opened'] = 1;

        // Нахожу максимальную ставку
        $data['max_bet'] = Bet::get_by_lot($model->id)->max('price');
        
        $cookie_data = json_decode(Cookie::get('favorite'));

        $data['cookies'] = [];
        if ( $cookie_data != null ) {
            $data['cookies'] = $cookie_data->lots;
            if ( gettype($cookie_data->lots) === 'string' ) {
                $data['cookies'] = [$cookie_data->lots];
            }
        }
        
        //dd(gettype($data['cookies']));
    	
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

    public function reload_bet(Request $request)
    {
        $bets = new Lot;
        
        $bet_cur = Lot::find($request->get('lot_id'))->only(['currency']);
        $bet_price = Lot::find($request->get('lot_id'))->only(['price']);
        $bet = Bet::get_by_lot($request->get('lot_id'))->max('price');
        
        if ( $request->ajax() ) {
            return ['bet' => $bets->getPrice($bet, $bet_cur['currency']), 'fullPrice' => $bets->getPrice($bet, $bet_cur['currency'])];
        }
    }
    
    public function make_bet(Request $request)
    {
        $min_bet = Lot::find($request->get('lot_id'))->pluck('min_bet')->first();
        // Максимальная ставка
        $min_value = Bet::get_by_lot($request->get('lot_id'))->max('price');
        // Начальная цена лота, с которой начинаюися ставки
        $start_price = Lot::find($request->get('lot_id'))->only('price');
        if( $min_value == null || $min_value <= $start_price ){
            $bet_validation = $start_price['price'];
        }else{
            $bet_validation = $min_value;
        }
        
        $validator = Validator::make($request->all(), [
            'price' => "required|numeric|gt:{$bet_validation}",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }else{

            $bet_user = new Bet;
            
            $bet_user->add($request->all());
            
            return response()->json([
                'success' => 'Ваша ставка прошла успешно!'
            ]);
        }
    }

    public function buy_now(Request $request)
    {
        $lot = lot::find( $request->get('lot_id') );       
        $lot->lot_time = null;
        //dd($lot->lot_time);
        $lot->save();

        $bet = new Bet;
        $new_bet = $request->all();
        $bet->price = $new_bet['buy_one_click_price'];
        $bet->user_id = $new_bet['user'];
        $bet->lot_id = $new_bet['lot_id'];
        $bet->save();

        $data['user'] = Auth::user()->email;
        $data['lot_name'] = $lot->title;
        $data['lot_id'] = $lot->id;
        $data['link_to_lot'] = $lot->slug;
        $to = Setting::where('tab', 2)->where('name', 'buy_one_click')->pluck('value')->first();

        \Mail::to($data['user'])->send(new LotOrderSuccess($data));
        \Mail::to($to)->send(new LotOrderSuccessAdmin($data));

        return redirect()->back()->with('byu_one_click_success', "Вы купили авто по стоимости {$lot->getPrice($lot->buy_one_click_price, $lot->currency)}. Подробную информацию Вы можете посмотреть в личном кабинете.");
    }
}
