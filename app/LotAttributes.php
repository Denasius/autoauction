<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LotAttributes extends Model
{
    protected $fillable = ['attr_id', 'lot_id'];
    
    public function lots()
    {
    	return $this->belongsToMany(Lot::class);
    }
}
