<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserImages extends Model
{
    protected $fillable = ['user_id', 'image_src'];
}
