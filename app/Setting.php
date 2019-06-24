<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Setting extends Model
{
	use Sluggable;
    protected $fillable = ['name', 'value', 'descr', 'type', 'tab'];

    public function sluggable()
    {
        return [
            'name' => [
                'source' => 'name'
            ]
        ];
    }

}
