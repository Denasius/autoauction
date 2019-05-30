<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

// количество цилиндров
class Carcylinders extends Model
{
	use Sluggable;

    protected $fillable = ['title'];

    public function lots()
    {
    	return $this->belongsToMany(
    		Lot::class, 
    		'lot_cylinders', 
    		'cylinder_id',  
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
