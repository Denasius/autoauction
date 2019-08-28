<?php

namespace App\Http\Controllers\Admin;

use App\Bet;
use App\Lot;
use App\Providers\AppServiceProvider;
use App\User;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BetsController extends Controller
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
        $data['bets'] = Bet::get_all();
        //dd($data['bets']);

        return view('admin.bets.index', $data);
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

        $data['lots'] = Lot::pluck('title', 'id')->all();
        $data['users'] = User::pluck('name', 'id')->all();


        return view('admin.bets.create', $data);
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
            'price' => 'required',
        ]);

        $bet_model = new Bet();
        $bet_model->add($request->all());

        return redirect()->route('bets.index');
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

        $data['item_info'] = Bet::find($id);
        $data['lots'] = Lot::pluck('title', 'id')->all();
        $data['users'] = User::pluck('name', 'id')->all();


        return view('admin.bets.edit', $data);
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
            'price' => 'required',
        ]);

        $bet = new Bet();
        $bet->edit($request->all(), $id);


        return redirect()->route('bets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bet::destroy($id);
        return redirect()->route('bets.index');
    }
}
