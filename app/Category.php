<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $table = 'categories';

    protected $fillable = ['title', 'descr', 'parent_category', 'meta_title', 'meta_description'];

    public function pages()
    {
        return $this->hasMany(Pages::class);
    }

    public function add($fields) {
        $Category = new Category();
        $Category->fill($fields);
        $Category->save();

    }

    public function edit($fields){
        $Category = Category::find($fields['id']);
        $Category->fill($fields);
        $Category->save();

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
