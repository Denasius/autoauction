<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;

class Aliase extends Model
{
    use Sluggable;

    protected $fillable = ['slug', 'type', 'type_id', 'template'];

    public static function add($name, $type, $type_id, $template = null) {
        
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
            $aliase->template    = $template;
            $aliase->save();
        }
    }

    public static function editAliase($name, $type, $type_id, $template)
    {
        $slug = SlugService::createSlug(Aliase::class, 'slug', $name, ['unique' => true]);        
        $aliase = Aliase::where('type_id', $type_id)->first();
        $aliase->slug       = $slug;
        $aliase->type       = $type;
        $aliase->type_id    = $type_id;
        $aliase->template    = $template;
        $aliase->save();
    }

    public static function edit($id, $fields) {
        $item = Aliase::find($id);
        //dd($item);
        $item->fill($fields);
        $item->save();
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
