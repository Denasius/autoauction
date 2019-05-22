<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
	use Sluggable;

    protected $fillable = ['title'];

    public function lots()
    {
    	return $this->belongsToMany(
    		Lot::class, 
    		'lot_tags', 
    		'tag_id',  
    		'lot_id'
    	);
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
