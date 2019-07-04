<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CarModel extends Model
{
    protected $fillable = ['title', 'brand_id'];

    public static function get_all() {
        return DB::table('car_models')
            ->orderBy('car_brands.title')
            ->orderBy('car_models.title')
            ->join('car_brands', 'car_models.brand_id', '=', 'car_brands.id')
            ->select('car_models.*', 'car_brands.title as brand')
            ->get();
    }

    public static function get_models_by_brand($type) {
        return DB::table('car_models')
            ->orderBy('car_brands.title')
            ->join('car_brands', 'car_models.brand_id', '=', 'car_brands.id')
            ->select('car_models.*', 'car_brands.title as brand')
            ->where('car_brands.id', $type)
            ->get();
    }

    public static function add($fields) {
        $object = new static;
        $object->fill($fields);
        $object->save();
    }

    public static function edit($id, $fields){
        $object = CarModel::find($id);
        $object->fill($fields);
        $object->save();
    }
}
