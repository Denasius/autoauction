<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Setting;
use App\Lot;
use App\Pages;

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
            
            $to = 'kdo@webernetic.by';
            $subject = 'Новое письмо с сайта VIN.by';
            $message = '
            <html>
            <head>
              <title>Вам отправлено письмо</title>
            </head>
            <body>
              <p>Вам отправлено письмо!</p>
              <table>
                <tr>
                  <th>Имя: '.$request->get('name').'</th>
                </tr>

                <tr>
                  <th>Телефон: '.$request->get('phone').'</th>
                </tr>
                 
              </table>
            </body>
            </html>
            ';
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'Content-type: text/html' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
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
