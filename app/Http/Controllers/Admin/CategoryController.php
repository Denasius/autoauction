<?php

namespace App\Http\Controllers\admin;

use App\Aliase;
use App\Category;
use App\Pages;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = array();
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();

        $data['categories'] = Category::all();

        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();;

        $data['categories'] = Category::all();
        return view('admin.categories.create', $data);
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
            'title'      => 'required',
        ]);

        $category_model = new Category();

        $results = $category_model->add($request->all());

        return redirect()->route('categories.index');
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
        $data = array();
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();;

        $data['categories'] = Category::all();
        $data['category_info'] = Category::find($id);

        $data['aliase'] = Aliase::where([
            ['type_id', '=', $id],
            ['type', '=', 'category'],
        ])->first();

        return view('admin.categories.edit', $data);
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
        $category_model = Category::find($id);
        $this->validate($request, [
            'title'      => 'required',
        ]);

        $category_model->edit($request->all());

        return redirect()->route('categories.index');
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
        $arrts = Pages::where('category_id', $id)->first();
        if (!$arrts) {
            Category::destroy($id);
            Aliase::remove(Category::TYPE, $id);
        }else {
            $errors = 'Существуют страницы прикрепленные к этой категории<br>Удалите их и повторите попытку';
        }

        return redirect()->route('categories.index')->withErrors($errors);
    }
}