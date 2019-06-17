<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LotImage extends Model
{
    protected $fillable = ['lot_id'];
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
        foreach ( $images as $image ) {
          foreach ( $images['src'] as $src ) {
            // $base64_image = $src;
            // $data = substr($base64_image, strpos($base64_image, ',') + 1);

            // $data = base64_decode($data);
            // $src_name = Str::random(10) . '.' . $src->extension(); 
            // Storage::disk('public')->put($src_name, $data);
            
          }
        }
    }

    public function removeImage()
    {
        if ( $this->image != null )
            Storage::delete('uploads/' . $this->image);
    }
}