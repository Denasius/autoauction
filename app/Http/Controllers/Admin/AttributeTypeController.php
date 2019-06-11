<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\AttributeType;
use App\User;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = AttributeType::all();
        return view('admin.attribute_types.index', ['results'=>$results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute_types.create');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute_type = AttributeType::find($id);
        return view('admin.attribute_types.edit', ['attribute_type'=>$attribute_type]);
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
            'title'      => 'required|unique:attribute_types',
        ]);

        $attribute_type->edit($request->all());

        return redirect()->route('attribute_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AttributeType::destroy($id);
        return redirect()->route('attribute_types.index');
    }
}