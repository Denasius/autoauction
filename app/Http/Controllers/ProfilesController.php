<?php

namespace App\Http\Controllers;

use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\User;
use File;
use Illuminate\Support\Str;
use App\Setting;
use App\UserImages;
use Illuminate\Support\Facades\Validator;

class ProfilesController extends Controller
{
    public  function index() {

        $data = [];
        $data['meta_title'] = 'Настройки профилия';
        $data['meta_description'] = 'Настройки профилия';

        $user = Auth::user();
        $data['user'] = $user;
        \Debugbar::info($user);

        return view('profiles.index', $data);
    }

    public function store(Request $request)
    {
        $user = User::find($request->get('user_id'));
        $validator = Validator::make($request->all(), [
            'entity' => 'required',
            'name' => 'required|min:3',
            'user_surname' => 'required|min:3',
            'email'     => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id), // при валидации учитываю пользователя и не проаеряю его mail на уникальность
            ],
            'user_index' => 'min:6',
            'user_country' => 'required',
            'user_region' => 'required',
            'user_phone' => 'required',
            'user_dob' => 'required'
        ]);
        if ( $validator->fails() )
            return redirect()->back()->withInput()->withErrors($validator, 'confirmRigister');

        $user->name = $request->get('name');
        $user->town = $request->get('town');
        $user->entity = $request->get('entity');
        $user->user_surname = $request->get('user_surname');
        $user->user_company = $request->get('user_company');
        $user->user_addres = $request->get('user_addres');
        $user->user_addres_2 = $request->get('user_addres_2');
        $user->user_country = $request->get('user_country');
        $user->user_region = $request->get('user_region');
        $user->user_index = $request->get('user_index');
        $user->user_phone = $request->get('user_phone');
        $user->user_dob = $request->get('user_dob');
        $user->user_interested = $request->get('user_interested');
        $user->user_for = $request->get('user_for');

        $user->save();
        if ( $user->confirm_register != null ) {    
            return redirect()->route('profile.info');
        }else{            
            return redirect()->back()->with('profile-success-update', 'Ваши данные успешно обновлены');
        }
        
    }

    public function show_info()
    {
        $data['images'] = UserImages::where('user_id', Auth::user()->id)->take(5)->get();
    	$data['meta_title'] = 'Инфо';
        $data['meta_description'] = 'Страница профиля';
        $user = Auth::user();
        $data['user'] = $user;
    	return view('profiles.info', $data);
    }

    public function save_images(Request $request)
    {
        $user = User::find($request->get('user_id'));
        $imageFile = $request->file('file');
        $imageName = uniqid().$imageFile->getClientOriginalName();
        $imageFile->move(public_path('uploads/docs'), $imageName);
        UserImages::create([
            'user_id' => $request->get('user_id'),
            'image_src' => $imageName
        ]);
        return response()->json(['Status'=>true, 'Message'=>'Image(s) Uploaded.']);
    }

    public function confirm(Request $request)
    {
        $user = User::find($request->get('user_id'));
        if ( $user->confirm_register == null ) {
            return redirect()->back()->with('finish_reg', 'Вы уже подтвердили регистрацию на сайте.');
        }
        $user->confirm_register = null;
        $user->save();
        return redirect()->route('profile.finish')->with('finish_registration', 'Спасибо за регистрацию на нашем сайте.');
    }

    public function finish_register()
    {
        $data['meta_title'] = 'Завершение регистрации';
        $data['meta_description'] = 'Завершение регистрации';
        return view('profiles.confirm', $data);
    }
}
