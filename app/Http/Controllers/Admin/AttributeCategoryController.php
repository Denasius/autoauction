<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\AttributeCategory;
use App\Providers\AppServiceProvider;
use App\User;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();


        $data['results'] = AttributeCategory::all()->sortBy('type');
        return view('admin.attribute-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();
        return view('admin.attribute-category.create', $data);
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
            'title'      => 'required|unique:attribute_categories',
        ]);

        $attribute_type_model = new AttributeCategory();

        $results = $attribute_type_model->add($request->all());

        return redirect()->route('attribute-category.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();

        $data['attribute_category'] = AttributeCategory::find($id);

        return view('admin.attribute-category.edit', $data);
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
        AttributeCategory::edit($request->all(), $id);

        return redirect()->route('attribute-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $errors = NULL;
        $arrts = Attribute::where('category_id', $id)->first();
        if (!$arrts) {
            AttributeCategory::destroy($id);
        }else {
            $errors = 'Существуют атрибуты прикрепленные к этой категории<br>Удалите их и повторите попытку';
        }

        return redirect()->route('attribute-category.index')->withErrors($errors);
    }
}