<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeCategory extends Model
{



    protected $fillable = ['title', 'type', 'add_filter'];


    public function get($type) {
        if (intval($type)) {
            $results = AttributeCategory::where('id', $type)->first();
        }else {
            $results = AttributeCategory::where('slug', $type)->first();
        }

        return $results;
    }

    public function add($fields){

        $AttributeCategory = new AttributeCategory();

        $AttributeCategory->fill($fields);
        $AttributeCategory->save();
        return true;
    }

    public static function edit($fields){
        if (! isset($fields['add_filter'])) 
            $fields['add_filter'] = null;
        $AttributeCategory = AttributeCategory::find($fields['id']);

        $AttributeCategory->fill($fields);
        $AttributeCategory->save();
    }
}
