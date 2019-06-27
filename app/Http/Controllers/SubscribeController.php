<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribtion;
use App\Mail\SubscribeEmail;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:subscribtions'
        ]);
        $subscriber = Subscribtion::add($request->get('email'));

        \Mail::to($subscriber)->send(new SubscribeEmail($subscriber));

        return redirect()->back()->with('status', 'Проверьте Вашу почту');
    }

    public function verify($token)
    {
    	$subscriber = Subscribtion::where('token', $token)->firstOrFail();
    	$subscriber->token = null;
    	$subscriber->save();

    	return redirect('/')->with('status', 'Ваша почта подтверждена, спасибо за подписку!');
    }
}
