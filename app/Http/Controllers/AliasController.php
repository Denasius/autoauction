<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aliase;
use App\Pages;
use App\Lot;
use App\Category;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\CategoryController;

class AliasController extends Controller
{
    public function alias($url)
    {
    	$routs_array = [];
    	$routes = explode('/', $url);

    	foreach ($routes as $alias) {
    		$item = Aliase::where('slug', $alias)->firstOrFail();
    		switch ($item->type) {
    			case 'page':
    				array_push($routs_array, Pages::find($item->type_id));
    				break;
    			
    			case 'lot':
    				array_push($routs_array, Lot::find($item->type_id));
    				break;

    			case 'category':
    				array_push($routs_array, Category::find($item->type_id));
    				break;
    			default:
    				return view('404');
    				break;
    		}
    	}

    	$model = array_pop($routs_array);
		switch ($item->type) {
			case 'page':
		    	$controller = new PageController();
				break;
			
			case 'lot':
				$controller = new LotController();
				break;

			case 'category':
				$controller = new CategoryController();
				break;
			default:
				return view('404');
				break;
		}
		return $controller->index($model, $routs_array);  	
    }
}
