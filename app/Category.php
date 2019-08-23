<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        Aliase::add($Category->title, $this->type, $Category->id);
    }

    public function edit($fields){
        $Category = Category::find($fields['id']);
        $Category->fill($fields);
        $Category->save();
        Aliase::add($Category->title, $this->type, $Category->id);

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

    public function uploadImage($image)
    {
        //dd($image);
        if ( $image == null ) return;

        $this->removeImage();

        $filename = Str::random(10) . '.' . $image->extension(); 
        $image->storeAs('uploads', $filename); 
        $this->image = $filename;
        $this->save(); 
    }

    public function removeImage()
    {
        if ( $this->image != null )
            Storage::delete('uploads/' . $this->image);
    }

    public function getImage()
    {
        if ( $this->image == null )
            return '/img/no-image.png';

        return '/uploads/' . $this->image;
    }

    public function getFormatString($string, $number = 40)
    {
        return str_limit($string, $number, '...');
    }

}
