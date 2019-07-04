<?php

namespace App\Http\Controllers;

use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
