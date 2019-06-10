<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\AttributeType;
use App\User;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
<<<<<<< HEAD

class AttributeTypeController extends Controller
=======
<<<<<<< HEAD:app/Http/Controllers/Admin/PagesController.php
use App\Pages;
use App\Category;

class PagesController extends Controller
=======

class AttributeTypeController extends Controller
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f:app/Http/Controllers/Admin/AttributeTypeController.php
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $attribyt_model = new AttributeType();
        $results = $attribyt_model->get_all();
        return view('admin.attribute_types.index', ['results'=>$results]);
=======
<<<<<<< HEAD:app/Http/Controllers/Admin/PagesController.php
        $posts = Pages::all();
        return view('admin.pages.index', ['posts'=> $posts]);
=======
        $results = AttributeType::all();
        return view('admin.attribute_types.index', ['results'=>$results]);
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f:app/Http/Controllers/Admin/AttributeTypeController.php
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        return view('admin.attribute_types.create');
=======
<<<<<<< HEAD:app/Http/Controllers/Admin/PagesController.php

        $categories = Category::pluck('title', 'id')->all();
        return view('admin.pages.create', ['categories' => $categories]);
=======
        return view('admin.attribute_types.create');
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f:app/Http/Controllers/Admin/AttributeTypeController.php
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
<<<<<<< HEAD
=======
<<<<<<< HEAD:app/Http/Controllers/Admin/PagesController.php
            'title' => 'required',
            'short_descr' => 'required',
            'descr' => 'required'

        ]);

        $page = Pages::add($request->all());
        $page->uploadImage($request->file('image'));
        $page->setCategory($request->get('category_id'));

        return redirect()->route('pages.index');
=======
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
            'title'      => 'required|unique:attribute_types',
        ]);

        $attribute_type_model = new AttributeType();

        $results = $attribute_type_model->add($request->all());

        return redirect()->route('attribute_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
<<<<<<< HEAD
=======
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f:app/Http/Controllers/Admin/AttributeTypeController.php
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
<<<<<<< HEAD
        $attribute_type = AttributeType::find($id);
        return view('admin.attribute_types.edit', ['attribute_type'=>$attribute_type]);
=======
<<<<<<< HEAD:app/Http/Controllers/Admin/PagesController.php
        $page = Pages::find($id);
        $categories = Category::pluck('title', 'id')->all();
        return view('admin.pages.edit', ['page' => $page, 'categories' => $categories]);
=======
        $attribute_type = AttributeType::find($id);
        return view('admin.attribute_types.edit', ['attribute_type'=>$attribute_type]);
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f:app/Http/Controllers/Admin/AttributeTypeController.php
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attribute_type = AttributeType::find($id);
        $this->validate($request, [
<<<<<<< HEAD
=======
<<<<<<< HEAD:app/Http/Controllers/Admin/PagesController.php
           'title' => 'required',
            'short_descr' => 'required',
            'descr' => 'required'
        ]);

        $page = Pages::find($id);
        $page->edit($request->all());
        $page->uploadImage($request->file('image'));
        $page->setCategory($request->get('category_id'));

        return redirect()->route('pages.index');
=======
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
            'title'      => 'required|unique:attribute_types',
        ]);

        $attribute_type->edit($request->all());

        return redirect()->route('attribute_types.index');
<<<<<<< HEAD
=======
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f:app/Http/Controllers/Admin/AttributeTypeController.php
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        AttributeType::destroy($id);
        return redirect()->route('attribute_types.index');
=======
<<<<<<< HEAD:app/Http/Controllers/Admin/PagesController.php
        Pages::find($id)->remove();
        return redirect()->route('pages.index');
=======
        AttributeType::destroy($id);
        return redirect()->route('attribute_types.index');
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f:app/Http/Controllers/Admin/AttributeTypeController.php
>>>>>>> 5126534dc5ef60070b04fff219d2762e6a58680f
    }
}
