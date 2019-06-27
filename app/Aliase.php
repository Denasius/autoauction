<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Aliase extends Model
{
    use Sluggable;

    protected $fillable = ['slug'];

    public static function add($name, $type, $type_id) {
        //Проверяем, что такого ЧПУ для этой записи(страницы итд) нету
        $check = Aliase::where([
            ['type', '=', $type],
            ['type_id', '=', $type_id],
        ])->first();

        if (!$check) {
            $slug = SlugService::createSlug(Aliase::class, 'slug', $name, ['unique' => true]);

            $aliase = new Aliase();
            $aliase->slug       = $slug;
            $aliase->type       = $type;
            $aliase->type_id    = $type_id;
            $aliase->save();
        }
    }

    public static function remove($type, $type_id){
        Aliase::where([
            ['type', '=', $type],
            ['type_id', '=', $type_id],
        ])->delete();
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
