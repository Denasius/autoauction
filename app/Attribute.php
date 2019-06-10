<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;


class Attribute extends Model
{
    use Sluggable;
    protected $fillable = ['title', 'type_id'];

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
        $Attribute->fill($fields);
        $Attribute->save();
        return true;
    }

    public function edit($fields){
        $AttributeType = Attribute::find($fields['id']);
        $AttributeType->fill($fields);
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
