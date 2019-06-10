<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;


class Pages extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'descr', 'meta_title', 'meta_description', 'short_descr'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public static function add($fields)
    {
        $page = new static;
        $page->fill($fields);

        $page->save();
        return $page;
    }

    public function getCategoryTitle()
    {

    	if ( $this->category != null )
    		return $this->category->title;

    	return 'Нет категории';
    }

    public function uploadImage($image)
    {
        if ( $image == null ) return;

        $this->removeImage();

        $filename = str_random(10) . '.' . $image->extension(); 
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

    public function setCategory($id)
    {
        if ( $id == null )
            return;

        $this->category_id = $id;
        $this->save();
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }
}