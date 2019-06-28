<?php

namespace App\Http\Controllers\Admin;

use App\Subscribtion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\AppServiceProvider;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();;

        $data['subscribtions'] = Subscribtion::all();

        return view('admin.subscribtions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();;

        return view('admin.subscribtions.create', $data);
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
            'email' => 'required|email|unique:subscribtions'
        ]);


        Subscribtion::add_admin($request->all());

        return redirect()->route('subscribtions.index');
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

        $data['subscribe'] = Subscribtion::find($id);

        return view('admin.subscribtions.edit', $data);
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
            'email' => 'required'
        ]);


        Subscribtion::edit_admin($id, $request->all());

        return redirect()->route('subscribtions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subscribtion::destroy($id);
        return redirect()->route('subscribtions.index');
    }


    //Активируем подписчика
    public function active_subscribe($id) {
        Subscribtion::active_subscribe($id);
        return redirect()->route('subscribtions.index');
    }
}
