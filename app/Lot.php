<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Lot extends Model
{
	use Sluggable;

	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function category()
    {
    	return hasOne(Category::class);
    }

    // теги, по типу аварийный, новый и т.д
    public function tags()
    {
    	return $this->belongsToMany(
    		Tag::class,
    		'lot_tags',
    		'lot_id',
    		'tag_id'
    	);
    }

    // марка авто
    public function brands()
    {
    	return $this->belongsToMany(
    		Carbrand::class,
    		'lot_brands',
    		'lot_id',
    		'brand_id'
    	);
    }

    // кол-во цилиндров
    public function cylinders()
    {
    	return $this->belongsToMany(
    		Carcylinders::class,
    		'lot_cylinders',
    		'lot_id',
    		'cylinder_id'
    	);
    }

    // диски
    public function disks()
    {
    	return $this->belongsToMany(
    		Cardisks::class,
    		'lot_disks',
    		'lot_id',
    		'disk_id'
    	);
    }

    // привод
    public function drives()
    {
    	return $this->belongsToMany(
    		Cardrive::class,
    		'lot_drives',
    		'lot_id',
    		'drive_id'
    	);
    }

    // топливо
    public function fuels()
    {
    	return $this->belongsToMany(
    		Carfuel::class,
    		'lot_fuels',
    		'lot_id',
    		'fuel_id'
    	);
    }

    // пробег
    public function mileages()
    {
    	return $this->belongsToMany(
    		Carmileage::class,
    		'lot_mileages',
    		'lot_id',
    		'mileage_id'
    	);
    }

    // объем двигателя
    public function potencias()
    {
    	return $this->belongsToMany(
    		Carpotencia::class,
    		'lot_potencias',
    		'lot_id',
    		'potencia_id'
    	);
    }

    // коробка передач
    public function transmissions()
    {
    	return $this->belongsToMany(
    		Cartransmission::class,
    		'lot_transmissions',
    		'lot_id',
    		'transmission_id'
    	);
    }
}
