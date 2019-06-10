<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;


class Attribute extends Model
{
    use Sluggable;
<<<<<<< HEAD
=======
    protected $fillable = ['title', 'type_id'];
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f

    //Получаем все атрибутоы по типу
    public function get_attribute_by_type($type) {

<<<<<<< HEAD

=======
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
        if (intval($type)) {
            $results = Attribute::where('type_id', $type)->get();
        }else {
            $type = AttributeType::where('slug', $type)->first();

            $results = Attribute::where('type_id', $type['id'])->get();
        }

<<<<<<< HEAD

=======
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
        return $results;
    }

    public function add($fields) {
        $Attribute = new Attribute();
<<<<<<< HEAD
        $Attribute->title = $fields['title'];
        $Attribute->type_id = $fields['type_id'];
=======
        $Attribute->fill($fields);
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
        $Attribute->save();
        return true;
    }

    public function edit($fields){
        $AttributeType = Attribute::find($fields['id']);
<<<<<<< HEAD
        $AttributeType->title = $fields['title'];
        $AttributeType->type_id = $fields['type_id'];
=======
        $AttributeType->fill($fields);
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
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
