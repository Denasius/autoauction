<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\Rule;
use Auth;

class ProfileController extends Controller
{
	/*
	* Метод вытаскивает из бд админа
	* Выводит шаблон
	*/
    public function index()
    {
        // dd(request()->path);
    	$user = User::where('is_admin', '=', '1');
    	$name = $user->first();
    	return view('admin.profile.index', ['user'=>$name]);
    }

    /*
	* Метод вытаскивает из бд админа по переданному в скрытом поле ID
	* Валидирует и обновляет информацию
	*/
    public function update(Request $request)
    {
    	$user = Auth::user();
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => [
    			'required',
    			'email',
    			Rule::unique('users')->ignore($user->id),
    		],
    		'town' => 'nullable', 
    		'avatar' => 'image'
    	]);

    	$user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->back()->with('status', 'Ваш профиль успешно обнавлен');
    }

}
