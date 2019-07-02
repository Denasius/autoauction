<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Slider extends Model
{

    protected $fillable = ['title', 'image', 'descr', 'alt', 'href'];

    public static function add($fields, $main_img) {

        $object = new Slider();
        $object->fill($fields);

        //Главная картинка
        $parth = false;
        if ($main_img) {
            $main_img_name = Lot::generate_image_name($main_img);
            $parth = $main_img->storeAs('uploads', $main_img_name);
        }
        $object->image = $parth;

        $object->save();

    }

    public static function edit($id, $fields, $image) {
        $object = Slider::find($id);
        $object->fill($fields);
        if ($image && strripos($image,'uploads/') === false) {
            $main_img_name = Lot::generate_image_name($image);
            $parth = $image->storeAs('uploads', $main_img_name);
            $object->image = $parth;
        }
        $object->save();
    }
}
