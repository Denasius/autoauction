<?php

namespace App\Http\Controllers\Admin;

use App\CarBrand;
use App\CarModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\AppServiceProvider;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();
        $params = $request->all();
        $data['filter'] = CarBrand::all();
        $data['filter_name'] = 'Тип';

        if (isset($params['filter_id']) && $params['filter_id']) {
            $data['filter_id'] = $params['filter_id'];
//            $data['results'] = $attribyt_model->get_attribute_by_type($params['filter_id']);
//            $data['models'] = CarModel::get_all();
            $data['models'] = CarModel::get_models_by_brand($params['filter_id']);
        }else {
            $data['models'] = CarModel::get_all();
        }



        return view('admin.models.index', $data);
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
        $data['brands'] = CarBrand::orderBy('title', 'asc')->pluck('title', 'id');

        return view('admin.models.create', $data);
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
            'title' => 'required'
        ]);

        CarModel::add($request->all());
        return redirect()->route('models.index');
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
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();;

        $data['item_info'] = CarModel::find($id);
        $data['brands'] = CarBrand::orderBy('title', 'asc')->pluck('title', 'id');

        return view('admin.models..edit', $data);
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
            'title' => 'required'
        ]);

        CarModel::edit($id, $request->all());
        return redirect()->route('models.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CarModel::destroy($id);
        return redirect()->back();
    }
}
