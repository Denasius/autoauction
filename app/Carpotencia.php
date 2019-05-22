<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

// объем двиателя
class Carpotencia extends Model
{
	use Sluggable;

    public function lots()
    {
    	return $this->belongsToMany(
    		Lot::class, 
    		'lot_tags', 
    		'potencia_id',  
    		'lot_id'
    	)
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
