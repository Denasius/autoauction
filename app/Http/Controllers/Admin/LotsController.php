<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lot;
use App\Category;
use App\Tag;
use App\Carcylinders;
use App\Carbrand;
use App\Cardisks;
use App\Cardrive;
use App\Carfuel;
use App\Carpotencia;
use App\Cartransmission;

class LotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lots = Lot::all();
        return view('admin.lots.index', ['lots'=>$lots]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();

        $data['categories'] = Category::pluck('title', 'id')->all();
        $data['tags'] = Tag::pluck('title', 'id')->all();

        return view('admin.lots.create', $data);
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
            'vin' => 'required',
        ]);

        $lot_model = new Lot();
        
        $lot_model->add($request->all());

        return redirect()->route('lots.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lot = Lot::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        $cylinders = Carcylinders::pluck('title', 'id')->all();
        $brands = Carbrand::pluck('title', 'id')->all();
        $disks = Cardisks::pluck('title', 'id')->all();
        $drives = Cardrive::pluck('title', 'id')->all();
        $fuels = Carfuel::pluck('title', 'id')->all();
        $potencias = Carpotencia::pluck('title', 'id')->all();
        $transmissions = Cartransmission::pluck('title', 'id')->all();
        $selectedBrands = $lot->brands->pluck('id')->all();
        $selectedTags = $lot->tags->pluck('id')->all();
        $selectedCylinders = $lot->cylinders->pluck('id')->all();
        $selectedDisks = $lot->disks->pluck('id')->all();
        $selectedDrives = $lot->drives->pluck('id')->all();
        $selectedFuels = $lot->fuels->pluck('id')->all();
        $selectedPotencias = $lot->potencias->pluck('id')->all();
        $selectedTransmissions = $lot->transmissions->pluck('id')->all();
        return view('admin.lots.edit', compact(
            'categories',
            'tags',
            'cylinders',
            'brands',
            'disks',
            'drives',
            'fuels',
            'potencias',
            'transmissions',
            'lot',
            'selectedBrands',
            'selectedTags',
            'selectedCylinders',
            'selectedDisks',
            'selectedDrives',
            'selectedFuels',
            'selectedPotencias',
            'selectedTransmissions'
        ));
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
            'title' => 'required', 
            'car_model' => 'required',
            'vin' => 'required', 
            'year' => 'required',
            'car_mileage' => 'required',
            'tyres' => 'required',
            'car_options' => 'nullable'
        ]);

        $lot = Lot::find($id);        
        $lot->edit($request->all());
        $lot->uploadImage($request->file('image'));
        $lot->setCategory($request->get('category_id'));
        $lot->setBrands($request->get('category_id'));
        $lot->setTags($request->get('tags'));
        $lot->setCylinders($request->get('cylinders'));
        $lot->setDisks($request->get('disks'));
        $lot->setDrives($request->get('drives'));
        $lot->setFuels($request->get('fuels'));
        $lot->setPotencias($request->get('potencias'));
        $lot->setTransmissions($request->get('transmissions'));

        $lot->toggleStatus($request->get('status'));

        return redirect()->route('lots.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lot::find($id)->remove();
        return redirect()->route('lots.index');
    }
}
