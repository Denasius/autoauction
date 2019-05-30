<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

// привод
class Cardrive extends Model
{
	use Sluggable;

    protected $fillable = ['title'];

    public function lots()
    {
    	return $this->belongsToMany(
    		Lot::class, 
    		'lot_drives', 
    		'drive_id',  
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
