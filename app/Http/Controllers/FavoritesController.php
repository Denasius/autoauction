<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lot;
use \Cookie;

class FavoritesController extends Controller
{
	public function index(Request $request)
	{
		$favorites_lot = json_decode(Cookie::get('favorite'));
		//dd($favorites_lot);
		$data['lots'] = false;
		if( $favorites_lot != null )
			$data['lots'] = Lot::all()->whereIn('id', $favorites_lot->lots);
		//dd($data['lots']);
		return view('favorites.index', $data);
	}
    public function wishlist(Request $request)
    {
    	if ($cookie_data = json_decode(Cookie::get('favorite'))) {
    		
    		if(!is_array($cookie_data->lots))
            {
                $data = [];
                $data[] = $cookie_data->lots;
            }else{
                $data = $cookie_data->lots;
            } // end if
            
            array_push($data, $request->get('lot_id'));
    	}else {
            $data   = $request->get('lot_id');
        }
    	return response('add-wishlist')->cookie(
		    'favorite', 
		    json_encode(['user' => $request->get('user_id'), 'lots' => $data ]), 
		    time() + (3600 * 24 * 30), 
		    '/'
		);
    }

    public function favorite_remove(Request $request)
    {
        if ($cookie_data = json_decode(Cookie::get('favorite'))) {
            
            if(!is_array($cookie_data->lots))
            {
                $data = '';
                
            }else{ // end if
                $data = $cookie_data->lots;
            	foreach ( $data as $key => $value ) {
            		if ( $value == $request->get('lot_id') ) {
            			unset($data[$key]);
            		}
            	}
                
            } // end else
            
            
            return response('delete-wishlist')->cookie(
                'favorite', 
                json_encode(['user' => $request->get('user_id'), 'lots' => $data ]), 
                time() + (3600 * 24 * 30), 
                '/'
            );
        }
    }
  
}
