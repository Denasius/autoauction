<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public static function upload_image_profile(Request $request){


        $file = $request->file('file');
        $parth = $file->store('uploads/profile');

        return $parth;
    }
}
