<?php

namespace App;

use App\LotAttributes;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DebugBar\DebugBar;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class Lot extends Model
{
    use Sluggable;


    const TYPE = 'lot';

    protected $fillable = ['title', 'desr', 'car_model', 'vin', 'category_id',
        'address', 'car_mileage','car_options', 'status', 'views', 'meta_title', 'meta_description', 'image'];


    public static function add($fields, $main_img) {

        $lot = new Lot();
        $lot->fill($fields);

        //Главная картинка
        $parth = false;
        if ($main_img) {
            $main_img_name = Lot::generate_image_name($main_img);
            $parth = $main_img->storeAs('uploads', $main_img_name);
        }
        $lot->image = $parth;

        $lot->save();

        //Добавляем ЧПУ
        Aliase::add($lot->title, Lot::TYPE, $lot->id);


        //Добавляем атрибуты
        if (isset($fields['attrs'])) {
            $lot_attr = new LotAttributes();
            foreach ($fields['attrs'] as $value) {
                if ($value) {
                    $lot_attr->create([
                        'attr_id'   => $value,
                        'lot_id'    => $lot->id,
                    ]);
                }
            }
        }

        //Добавляем картинки
        if (isset($fields['images']) && $fields['images'] != null){
            foreach ( $fields['images']['src'] as $key => $src ) {
                $main_img_name = Lot::generate_image_name_base64($src, $fields['images']['name'][$key]);
                $img = Image::make($src);
                $img->save('uploads/'. $main_img_name);
                LotImage::create([
                    'lot_id'        => $lot->id,
                    'image_src'     => 'uploads/'. $main_img_name,
                    'image_alt'     => $fields['images']['alt'][$key],
                    'image_title'   => $fields['images']['title'][$key],
                    'image_descr'   => $fields['images']['descr'][$key],
                ]);
            }
        }

        //Добавляем Тегов
        if (isset($fields['tags'])) {
            $lot_tag = new LotTag();
            foreach ($fields['tags'] as $value) {
                if ($value) {
                    $lot_tag->create([
                        'tag_id' => $value,
                        'lot_id' => $lot->id,
                    ]);
                }
            }
        }
    }

    public static function edit($id ,$fields, $main_img){
        $lot = Lot::find($id);
        $lot->fill($fields);

        //Главная картинка
        $parth = false;
        if ($main_img) {
            $main_img_name = Lot::generate_image_name($main_img);
            $parth = $main_img->storeAs('uploads', $main_img_name);
        }
        $lot->image = $parth;

        $lot->save();

        //Добавляем ЧПУ
        Aliase::add($lot->title, Lot::TYPE, $lot->id);


        //Добавляем атрибуты
        $lot_attr = new LotAttributes();
        $lot_attr->where('lot_id', $fields['id'])->delete();
        if (isset($fields['attrs'])) {
            foreach ($fields['attrs'] as $value) {
                if ($value) {
                    $lot_attr->create([
                        'attr_id' => $value,
                        'lot_id' => $fields['id'],
                    ]);
                }
            }
        }

        //Добавляем Тегов
        $lot_tag = new LotTag();
        $lot_tag->where('lot_id', $fields['id'])->delete();
        if (isset($fields['tags'])){
            foreach ($fields['tags'] as $value) {
                if ($value) {
                    $lot_tag->create([
                        'tag_id' => $value,
                        'lot_id' => $fields['id'],
                    ]);
                }
            }
        }

        //Добавляем картинки
        LotImage::where('lot_id', $id)->delete();
        if (isset($fields['images']) && $fields['images'] != null){
            foreach ( $fields['images']['src'] as $key => $src ) {
                if (strripos($src,'uploads/') !== false) {
                    LotImage::create([
                        'lot_id'        => $lot->id,
                        'image_src'     => $src,
                        'image_alt'     => $fields['images']['alt'][$key],
                        'image_title'   => $fields['images']['title'][$key],
                        'image_descr'   => $fields['images']['descr'][$key],
                    ]);
                }else {
                    $main_img_name = Lot::generate_image_name_base64($src, $fields['images']['name'][$key]);
                    $img = Image::make($src);
                    $img->save('uploads/'. $main_img_name);
                    LotImage::create([
                        'lot_id'        => $lot->id,
                        'image_src'     => 'uploads/'. $main_img_name,
                        'image_alt'     => $fields['images']['alt'][$key],
                        'image_title'   => $fields['images']['title'][$key],
                        'image_descr'   => $fields['images']['descr'][$key],
                    ]);
                }
            }
        }

    }

    public static function remove($id){

        LotAttributes::where('lot_id', $id)->delete();
        LotImage::where('lot_id', $id)->delete();
        LotTag::where('lot_id', $id)->delete();
        Bet::where('lot_id', $id)->delete();
        Aliase::remove(self::TYPE, $id);
        Lot::destroy($id);
    }

    //Генерируем чпу урл для картинки
    public static function generate_image_name($image){
        //Вырезам название файла до первой точки
        $result = stristr($image->getClientOriginalName(), '.', true);
        //Переводим имя в ЧПУ
        $result = SlugService::createSlug(Lot::class, 'image', $result, ['unique' => false]);
        //Добавляем размер файла(для уникальности) и расширение
        $result .= '-' . $image->getClientSize() . '.' . $image->getClientOriginalExtension();
        return $result;
    }

    //Генерируем чпу урл для картинки из base64 кода
    public static function generate_image_name_base64($src, $name) {

        //Имя в нижний регист и получаем расширение файла после
        $name = Str::lower($name);
        $extension = stristr($name, '.');

        //Сохраняем картинку во временнный каталог для получения размера изображения
        $img = Image::make($src);
        $img->save('uploads/temp/size'. $extension);

        //Получаем ия изображения и делаем его ЧПУ
        $result = stristr($name, '.', true);
        $result = SlugService::createSlug(Lot::class, 'image', $result, ['unique' => false]);

        //Добавляем к имени размер файла и расширения)) Все блеать!!!! Ебаный кастыль
        $result .= '-' . $img->filesize() . $extension;

        $img->save('uploads/'. $result);

        return $result;
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
