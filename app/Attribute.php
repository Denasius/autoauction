<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;


class Attribute extends Model
{
    use Sluggable;
    protected $fillable = ['title', 'type_id'];


    //Получаем все атрибуты с их типами
    public static function get_all(){
        return DB::table('attributes')
            ->orderBy('attributes.type_id')
            ->join('attribute_types', 'attributes.type_id', '=', 'attribute_types.id')
            ->select('attributes.*', 'attribute_types.title as type_title')
            ->get();
    }

    //Получаем все атрибутоы по типу
    public function get_attribute_by_type($type) {

        return DB::table('attributes')
            ->orderBy('attributes.type_id')
            ->join('attribute_types', 'attributes.type_id', '=', 'attribute_types.id')
            ->select('attributes.*', 'attribute_types.title as type_title')
            ->where('attributes.type_id', $type)
            ->get();
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