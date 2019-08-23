<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribtion;
use App\Mail\SubscribeEmail;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribtions'
        ]);
        if( $validate->fails() )
            return redirect( url()->previous() . '#partners' )->withErrors( $validate)->withInput();
            
        $subscriber = Subscribtion::add($request->get('email'));

        \Mail::to($subscriber)->send(new SubscribeEmail($subscriber));

        return redirect( url()->previous() . '#partners' )->with('status-subscribe', 'Проверьте Вашу почту');
    }

    public function verify($token)
    {
    	$subscriber = Subscribtion::where('token', $token)->firstOrFail();
    	$subscriber->token = null;
    	$subscriber->save();

    	return redirect('/')->with('status', 'Ваша почта подтверждена, спасибо за подписку!');
    }
}
