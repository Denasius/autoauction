<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    protected $fillable = ['title'];

    public static function add($fields) {
        $object = new static;
        $object->fill($fields);
        $object->save();
    }

    public static function edit($id, $fields){
        $object = CarBrand::find($id);
        $object->fill($fields);
        $object->save();
    }
}
