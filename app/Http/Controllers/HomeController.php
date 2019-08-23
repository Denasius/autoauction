<?php

namespace App\Http\Controllers;

use App\Slider;
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
        $all_lots = Lot::all()->sortByDesc('created_at');
        $data['randomLots'] = $all_lots->where('status',1)->take(3);
        $data['lots'] = $all_lots->where('status',1)->take(5);
        $data['timeOutLots'] = $all_lots->where('status',0)->take(2);

        $data['sliders'] = Slider::all();
        
        $data['text_under_slider'] = Setting::where('tab', 4)->where('name', 'text-under-slider')->pluck('value')->first();
        $data['actions_text'] = Setting::where('tab', 4)->where('name', 'action-sequence-title')->pluck('value')->first();
        $data['under_actions_text'] = Setting::where('tab', 4)->where('name', 'under-action-text')->pluck('value')->first();

        /* Кастылюга...потом переделаю */
        $data['actions'] = Setting::where('tab', 4)->where('name', 'like', 'fa-%')->get();
        $data['info'] = Setting::where('tab', 4)->where('name', 'like', 'info-%')->pluck('value', 'descr');
        //dd($data['info']);
       

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

            $data['name'] = $request->get('name');
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
