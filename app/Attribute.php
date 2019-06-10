<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;


class Attribute extends Model
{
    use Sluggable;

    //Получаем все атрибутоы по типу
    public function get_attribute_by_type($type) {


        if (intval($type)) {
            $results = Attribute::where('type_id', $type)->get();
        }else {
            $type = AttributeType::where('slug', $type)->first();

            $results = Attribute::where('type_id', $type['id'])->get();
        }


        return $results;
    }

    public function add($fields) {
        $Attribute = new Attribute();
        $Attribute->title = $fields['title'];
        $Attribute->type_id = $fields['type_id'];
        $Attribute->save();
        return true;
    }

    public function edit($fields){
        $AttributeType = Attribute::find($fields['id']);
        $AttributeType->title = $fields['title'];
        $AttributeType->type_id = $fields['type_id'];
        $AttributeType->save();
    }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
