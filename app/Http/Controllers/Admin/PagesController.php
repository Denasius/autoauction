<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\AttributeType;
use App\Providers\AppServiceProvider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages;
use App\Category;

class PagesController extends Controller
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
        $data['posts'] = Pages::getAllPagesAndCategories();
        return view('admin.pages.index', $data);
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
        $data['categories'] = Category::pluck('title', 'id')->all();
        return view('admin.pages.create', $data);
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
            'title' => 'required',
            'short_descr' => 'required',
            'descr' => 'required'
        ]);

        $page = Pages::add($request->all());
        $page->uploadImage($request->file('image'));
        // $page->setCategory($request->get('category_id'));

        return redirect()->route('pages.index');
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

        $data['page'] = Pages::find($id);
        $data['categories'] = Category::pluck('title', 'id')->all();
        return view('admin.pages.edit', $data);
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
           'title' => 'required',
            'short_descr' => 'required',
            'descr' => 'required'
        ]);

        $page = Pages::find($id);
        $page->edit($request->all());
        $page->uploadImage($request->file('image'));
        $page->setCategory($request->get('category_id'));

        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Pages::find($id)->remove();
        return redirect()->route('pages.index');

    }
}
