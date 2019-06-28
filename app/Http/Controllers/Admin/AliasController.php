<?php

namespace App\Http\Controllers\Admin;

use App\Aliase;
use App\Category;
use App\Lot;
use App\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\AppServiceProvider;

class AliasController extends Controller
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

        //Это можно попробовать переделать в меньшее количество запросов через inner join...
        $data['aliases'] = [];
        $results = Aliase::orderBy('type')->get();

        foreach ($results as $result) {

            if ($result->type == 'lot') {
                $type = 'Лот';
                $item = Lot::find($result->type_id);
                $href = route('lots.edit', $result->type_id);
            }
            if ($result->type == 'page') {
                $type = 'Страница';
                $item = Pages::find($result->type_id);
                $href = route('pages.edit', $result->type_id);
            }
            if ($result->type == 'category') {
                $type = 'Категория';
                $item = Category::find($result->type_id);
                $href = route('categories.edit', $result->type_id);

            }


            $data['aliases'][] = [
                'id'    => $result->id,
                'slug'  => $result->slug,
                'type'  => $type,
                'href'  => $href,
                'title' => $item->title,
            ];
        }


        return view('admin.aliases.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('aliases.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $data['info'] = Aliase::find($id);


        return view('admin.aliases.edit', $data);
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
        $this->validate($request, [
            'slug' => 'required|unique:aliases,slug,'.$id
        ]);


        Aliase::edit($id, $request->all());

        return redirect()->route('aliases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aliase::destroy($id);
        return redirect()->route('aliases.index');
    }
}
