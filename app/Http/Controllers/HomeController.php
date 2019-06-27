<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Setting;
use App\Lot;
use App\Pages;
use App\Mail\SendMail;

class HomeController extends Controller
{
    public function index()
    {
        $data['attr'] = Setting::where('tab', 1)->get();
        return view('home.index', $data);
    }

    public function search(Request $request)
    {
    	$this->validate($request, [
    		'query' => 'required'
    	]);
    	$query = $request->input('query');
    	$lots = Lot::where('title', 'like', "%$query%")->get();

    	return view('layouts.search', ['lots' => $lots]);
    }

    public function callback(Request $request)
    {
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

    public function show($slug)
    {
        $data['page'] = Pages::where('slug', $slug)->firstOrFail();
        return view('pages.index', $data);
    }
}
