<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['title'];
    protected $type = 'tag';
    const TYPE = 'tag';

    public function add($fields) {
        $tag = new Tag();
        $tag->fill($fields);
        $tag->save();
        Aliase::add($tag->title, $this->type, $tag->id);
    }

    public function edit($fields){
        $tag = Tag::find($fields['id']);
        $tag->fill($fields);
        $tag->save();
        Aliase::add($tag->title, $this->type, $tag->id);
    }
}
