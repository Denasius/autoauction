<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function uploadImages()
    {
        return view('admin.upload.index');
    }
}
