<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use Sluggable;

    protected $fillable = ['title'];

    public function add($fields) {
        $tag = new Tag();
        $tag->fill($fields);
        $tag->save();
    }

    public function edit($fields){
        $Tag = Tag::find($fields['id']);
        $Tag->fill($fields);
        $Tag->save();
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
