<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\AttributeType;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
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
        $attribyt_model = new Attribute();
        $data['filter'] = AttributeType::all();
        $data['filter_name'] = 'Тип';


        if (isset($params['filter_id']) && $params['filter_id']) {
            $data['filter_id'] = $params['filter_id'];
            $data['results'] = $attribyt_model->get_attribute_by_type($params['filter_id']);
        }else {
            $data['results'] = $attribyt_model->get_all();
        }


        return view('admin.attributes.index', $data);
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

        $data['types'] = AttributeType::all();
        return view('admin.attributes.create', $data);
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
            'type_id'    => 'required',
        ]);

        $attribute_model = new Attribute();

        $results = $attribute_model->add($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = [];
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();

        $attribyt_model = new Attribute();
        $attribyt_type_model = new AttributeType();


        $data['results'] = $attribyt_model->get_attribute_by_type($id);
        $data['type'] = $attribyt_type_model->get($id);

        return view('admin.attributes.index', $data);
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

        $data['attribute'] = Attribute::find($id);
        $data['types'] = AttributeType::all();

        return view('admin.attributes.edit', $data);
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
        $attribute = Attribute::find($id);
        $this->validate($request, [
            'title'      => 'required',
            'type_id'      => 'required',
        ]);

        $attribute->edit($request->all());

        return redirect()->route('attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attribute::destroy($id);
        return redirect()->back();
    }
}
