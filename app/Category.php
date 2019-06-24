<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;

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

    public function getTitleParentCategory($parentID)
    {
        $query = DB::table('categories')
                ->where('categories.id', '=', $parentID)
                ->select('categories.title')
                ->get();

        $parent = '';
        foreach ( $query as $item ) {
            $parent = $item->title;
        }
        return $parent;
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
