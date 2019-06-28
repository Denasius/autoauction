<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscribtion extends Model
{

    protected $fillable = ['email', 'token'];

    public static function add_admin($fields){
        $sub = new Subscribtion();
        $sub->fill($fields);
        $sub->save();
    }

    public static function edit_admin($id, $fields) {
        $sub = Subscribtion::find($id);
        $sub->fill($fields);
        $sub->save();
    }


    public static function active_subscribe($id) {
        $sub = Subscribtion::find($id);
        $sub->token = NULL;
        $sub->save();
    }


    public static function add($email)
    {
        $sub = new static;
        $sub->email = $email;
        $sub->token = Str::random(100);
        $sub->save();

        return $sub;
    }


}
