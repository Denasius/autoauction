<?php

namespace App;

use App\LotAttributes;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DebugBar\DebugBar;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Intervention\Image\ImageManagerStatic as Image;

class Lot extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'desr', 'car_model', 'vin', 'category_id', 'address', 'car_mileage','car_options', 'status', 'views', 'meta_title', 'meta_description'];


    public function add($fields){
        $lot = new Lot();
        $lot->fill($fields);
        $lot->save();

        //Добавляем атрибуты
        $lot_attr = new LotAttributes();
        foreach ($fields['attrs'] as $value) {
            if ($value) {
                $lot_attr->create([
                    'attr_id'   => $value,
                    'lot_id'    => $lot->id,
                ]);
            }
        }

        //Добавляем картинки
        if ( $fields['images'] != null ){
            foreach ( $fields['images']['src'] as $key => $src ) {

                $slug = SlugService::createSlug(LotImage::class, 'slug', $fields['images']['name'][$key], ['unique' => false]);
                Image::make($src)->save('uploads/'. $slug);

                $image_model = new LotImage();
                $image_model->create([
                    'lot_id'        => $lot->id,
                    'image_src'     => 'uploads/'. $slug,
                    'image_alt'     => $fields['images']['alt'][$key],
                    'image_title'   => $fields['images']['title'][$key],
                    'image_descr'   => $fields['images']['descr'][$key],
                ]);
            }
        }
    }

    public function edit($fields, $file){
        $lot = Lot::find($fields['id']);
        $lot->fill($fields);
        $lot->save();

        //Добавляем атрибуты
        $lot_attr = new LotAttributes();
        $lot_attr->where('lot_id', $fields['id'])->delete();
        foreach ($fields['attrs'] as $value) {
            if ($value) {
                $lot_attr->create([
                    'attr_id' => $value,
                    'lot_id' => $fields['id'],
                ]);
            }
        }

        //Добавляем Тегов
        $lot_tag = new LotTag();
        $lot_tag->where('lot_id', $fields['id'])->delete();
        foreach ($fields['tags'] as $value) {
            if ($value) {
                $lot_tag->create([
                    'tag_id' => $value,
                    'lot_id' => $fields['id'],
                ]);
            }
        }

        if ($file) {
            $path = $file->store('uploads');
            $lot->image = $path;
            $lot->save();
        }


    }

    public static function remove($id){
        Lot::destroy($id);
        LotAttributes::where('lot_id', $id)->delete();
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
