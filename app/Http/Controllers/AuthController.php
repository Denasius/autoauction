<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    protected $redirectTo = '/profile-info';
    public function registerForm()
    {
    	return view('pages.register');
    }

    /*
	* Метод регистрирует нового пользователя
    */
    public function register(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required', 
    		'email' => 'required|email|unique:users',
    		'town' => 'nullable',
    		'password' => 'required'
    	]);
    	
    	$user = User::add($request->all());
    	$user->generatePassword($request->get('password'));
        Auth::login($user);

    	return redirect()->route('profile');
    }

    /*
	* Метод шаблон логина
    */
    public function loginForm()
    {
    	return view('pages.login');
    }

    /*
	* Метод авторизирует нового пользователя
	* Валидируем поля
	* Метод attempt проверяет наличие в бд тех данных, которые ввел пользователь, возвращает true или false
	* если это админ - редиректим в админку, иначе на главную
	* если ошибка - редиректим обратно на логин с выводом ошибки
	* 
    */
    public function login(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

    	$result = Auth::attempt([
    		'email' => $request->get('email'), 
    		'password' => $request->get('password')
    	], $request->get('remember'));

    	if ( $result ) {
    		if ( Auth::user()->is_admin ) {
    			return redirect()->route('admin');
    		}
    		return redirect('/');
    	}

    	return redirect()->back()->with('status', 'Неправильный логин, или пароль');
    }

    /*
	* Метод выхода из аккаунта
    */
    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }
}
