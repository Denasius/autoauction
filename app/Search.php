<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public static function get_results_admin($fields){

        $data = [];

        $data['pages'] = Pages::where('title', 'like', '%'.$fields['search'].'%')->get();
        $data['categories'] = Category::where('title', 'like', '%'.$fields['search'].'%')->get();
        $data['lots'] = Lot::where('title', 'like', '%'.$fields['search'].'%')->get();
        $data['tags'] = Tag::where('title', 'like', '%'.$fields['search'].'%')->get();
        $data['attributes'] = AttributeCategory::where('title', 'like', '%'.$fields['search'].'%')->get();

        return $data;
    }
}
