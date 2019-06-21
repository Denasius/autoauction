<?php

namespace App\Http\Controllers\Admin;

use App\Providers\AppServiceProvider;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        $data['error'] = false;
        if (isset($request->error)) $data['error'] = $request->error;

        $data['tab_1'] = Setting::where('tab', 1)->get();
        $data['tab_2'] = Setting::where('tab', 2)->get();
        $data['tab_3'] = Setting::where('tab', 3)->get();
        $data['tab_4'] = Setting::where('tab', 4)->get();

        return view('admin.settings.index', $data);
    }

    public function update(Request $request){

        //Проверка на уникальность полей
        $error = false;
        $arr = [];
        $items = $request->all();
        foreach ($items['name'] as $key=>$item) {
            if (isset($arr[$items['name'][$key]])) {
                $arr[$items['name'][$key]]++;
            }else {
                $arr[$items['name'][$key]] = 1;
            }
        }

        foreach ($arr as $key=>$item) {

            if ($item > 1) {
                if (!$error) $error = 'error=';
                $error .= 'Поле уже существует"' . $key . '<br>';
            }
        }



        if ($error) {
            return redirect()->route('settings.index', $error);
        }else {

            Setting::truncate();
            foreach ($items['name'] as $key=>$item) {
                $setting = new Setting();

                $setting->name = $items['name'][$key];
                $setting->value = $items['value'][$key];
                $setting->descr = $items['descr'][$key];
                $setting->type = $items['type'][$key];
                $setting->tab = $items['tab'][$key];

                $setting->save();

            }

            return redirect()->route('settings.index');
        }

    }
}
