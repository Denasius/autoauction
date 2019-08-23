<?php

namespace App\Http\Controllers;

use App\Lot;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\UserImages;

class ImagesController extends Controller
{
    public static function upload_image_profile(Request $request){


        $file = $request->file('file');
        $parth = $file->store('uploads/profile');

        return $parth;
    }

    //Типа универсальная загрузка изображения...
    public static function upload_image(Request $request){

        $url = 'uploads';
        $fields = $request->all();
        $file = $request->file('file');

        //Если указана папка в которую загружать картинку
        if (isset($fields['folder']) && $fields['folder'] && $fields['folder'] != 'false') {
            $url .= '/' . $fields['folder'];
        }

        //Если ЧПУ то делаем чпу урл, иначе просто генерируем рандоманое имя
        if (isset($fields['seo_url']) && $fields['seo_url'] && $fields['seo_url'] != 'false') {
            $file_name = self::generate_image_name($file);
            $parth = $file->storeAs($url, $file_name);
        }else {
            $parth = $file->store($url);
        }

        //Возвращаем путь до загруженной картинки
        return $parth;
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

    // Удаление только для файлов, которые лежат в папке uploads/docs
    public function removeImage( Request $request )
    {
        if ( $request->get('file') != null ) {
            $image = UserImages::where('image_src', $request->get('file'))->where('user_id', $request->get('user_id'));
            $image->delete();
            unlink(public_path('uploads/docs/' . $request->get('file')));
        }
    }
}
