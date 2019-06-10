<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class AttributeType extends Model
{
    use Sluggable;

    protected $fillable = ['title'];

    public function get($type) {
        if (intval($type)) {
            $results = AttributeType::where('id', $type)->first();
        }else {
            $results = AttributeType::where('slug', $type)->first();
        }

        return $results;
    }

    public function add($fields){

        $AttributeType = new AttributeType();
        $AttributeType->fill($fields);
        $AttributeType->save();
        return true;
    }

    public function edit($fields){
        $AttributeType = AttributeType::find($fields['id']);
        $AttributeType->fill($fields);
        $AttributeType->save();
    }



    //Автоматическое заполнение slug
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
