<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;

class Pages extends Model
{
    protected $type = 'page';
    const TYPE = 'page';
    protected $fillable = ['title', 'descr', 'meta_title', 'meta_description', 'short_descr', 'category_id', 'template'];


    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(PageComment::class);
    }

    public static function add($fields)
    {
        $page = new static;
        $page->fill($fields);
        $page->save();

        Aliase::add($page->title, self::TYPE, $page->id);

        return $page;
    }

    public static function getAllPagesAndCategories()
    {
        return DB::table('pages')
        ->join('categories', 'pages.category_id', 'categories.id')
        ->select('pages.id', 'pages.title', 'categories.title as cat_title')
        ->get();
    }

    public function uploadImage($image)
    {
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
        Aliase::add($this->title, $this->type, $this->id);
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public static function get_by_title($title) {
        return Pages::where('title', 'like', '%'.$title.'%')->get();
    }

    public function getFormatDate($value) {
        Date::setLocale('ru_RU');
        return Date::parse($value)->format('d M, Y');
    }

    public function getFormatString($string, $number = 40)
    {
        return str_limit($string, $number, '...');
    }
}
