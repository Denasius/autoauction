<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;


class Attribute extends Model
{
    use Sluggable;
    protected $fillable = ['title', 'category_id'];


    //Получаем все атрибуты с их типами
    public static function get_all(){
        return DB::table('attributes')
            ->orderBy('attribute_categories.type')
            ->orderBy('attributes.category_id')
            ->join('attribute_categories', 'attributes.category_id', '=', 'attribute_categories.id')
            ->select('attributes.*', 'attribute_categories.title as type_title', 'attribute_categories.type as type_type')
            ->get();
    }

    //Получаем все атрибутоы по типу
    public function get_attribute_by_type($type) {

        return DB::table('attributes')
            ->orderBy('attributes.category_id')
            ->join('attribute_categories', 'attributes.category_id', '=', 'attribute_categories.id')
            ->select('attributes.*', 'attribute_categories.title as type_title')
            ->where('attributes.category_id', $type)
            ->get();
    }

    public function add($fields) {
        $Attribute = new Attribute();
        $Attribute->fill($fields);
        $Attribute->save();
        return true;
    }

    public function edit($fields){
        $Attribute = Attribute::find($fields['id']);
        $Attribute->fill($fields);
        $Attribute->save();
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