<?php

namespace App\Http\Controllers;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ImagesUploadController extends Controller
{
    // public static function upload_image_profile(Request $request){


    //     $file = $request->file('file');
    //     $parth = $file->store('uploads/profile');

    //     return $parth;
    // }

    // //Типа универсальная загрузка изображения...
    // public static function upload_image(Request $request){

    //     $url = 'uploads';
    //     $fields = $request->all();
    //     $file = $request->file('file');

    //     //Если указана папка в которую загружать картинку
    //     if (isset($fields['folder']) && $fields['folder'] && $fields['folder'] != 'false') {
    //         $url .= '/' . $fields['folder'];
    //     }

    //     //Если ЧПУ то делаем чпу урл, иначе просто генерируем рандоманое имя
    //     if (isset($fields['seo_url']) && $fields['seo_url'] && $fields['seo_url'] != 'false') {
    //         $file_name = self::generate_image_name($file);
    //         $parth = $file->storeAs($url, $file_name);
    //     }else {
    //         $parth = $file->store($url);
    //     }

    //     //Возвращаем путь до загруженной картинки
    //     return $parth;
    // }

    // //Генерируем чпу урл для картинки
    // public static function generate_image_name($image){
    //     //Вырезам название файла до первой точки
    //     $result = stristr($image->getClientOriginalName(), '.', true);
    //     //Переводим имя в ЧПУ
    //     $result = SlugService::createSlug(Lot::class, 'image', $result, ['unique' => false]);
    //     //Добавляем размер файла(для уникальности) и расширение
    //     $result .= '-' . $image->getClientSize() . '.' . $image->getClientOriginalExtension();
    //     return $result;
    // }

    public function upload_image_froala(Request $request)
    {
        // Allowed extentions.
        dd($request->all());
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $file = $request->file('file');

        // Get filename.
        $temp = explode(".", $file);

        // Get extension.
        $extension = end($temp);

        // An image check is being done in the editor but it is best to
        // check that again on the server side.
        // Do not use $_FILES["file"]["type"] as it can be easily forged.
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);

        if ((($mime == "image/gif")
        || ($mime == "image/jpeg")
        || ($mime == "image/pjpeg")
        || ($mime == "image/x-png")
        || ($mime == "image/png"))
        && in_array($extension, $allowedExts)) {
            // Generate new random name.
            $name = sha1(microtime()) . "." . $extension;

            // Save file in the uploads folder.
            move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/uploads/" . $name);

            // Generate response.
            $response = new StdClass;
            $response->link = "/uploads/" . $name;
            echo stripslashes(json_encode($response));
        }
    }
}
