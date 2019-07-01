<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;

class Category extends Model
{

    protected $table = 'categories';
    protected $type = 'category';
    const TYPE = 'category';

    protected $fillable = ['title', 'descr', 'parent_category', 'meta_title', 'meta_description', 'template'];

    public function pages()
    {
        return $this->hasMany(Pages::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_category');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category');
    }

    public function add($fields) {
        $Category = new Category();
        $Category->fill($fields);
        $Category->save();
        Aliase::add($Category->title, $this->type, $Category->id, $Category->template);
    }

    public function edit($fields){
        $Category = Category::find($fields['id']);
        $Category->fill($fields);
        $Category->save();
        // конструкция Aliase::add не работает при обновлении данных, так как при Aliase::add мы создаем новый объект модели Aliase, а нам нужно отредактировать уже существующий (для Pages и Category моделей)
        Aliase::editAliase($Category->title, $this->type, $Category->id, $Category->template);

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

}
