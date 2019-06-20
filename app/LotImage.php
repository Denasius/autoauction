<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Cviebrock\EloquentSluggable\Services\SlugService;

class LotImage extends Model
{
    protected $fillable = ['lot_id', 'image_src', 'image_descr', 'image_alt', 'image_title'];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields)
    {
        $page = new static;
        $page->fill($fields);

        $page->save();
        return $page;
    }

    public function uploadImages($images)
    {
        if ( $images == null ) return;
          foreach ( $images['src'] as $key => $src ) {

              $slug = SlugService::createSlug(LotImage::class, 'slug', $images['name'][$key], ['unique' => false]);
              Image::make($src)->save('uploads/'. $slug);


          }
    }

    public function removeImage()
    {
        if ( $this->image != null )
            Storage::delete('uploads/' . $this->image);
    }
}