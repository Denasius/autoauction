<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

// диски
class Cardisks extends Model
{
	use Sluggable;

    protected $fillable = ['title'];

    public function lots()
    {
    	return $this->belongsToMany(
    		Lot::class, 
    		'lot_disks', 
    		'disk_id',  
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
