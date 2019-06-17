<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\AttributeType;
use App\Bet;
use App\LotTag;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lot;
use App\LotImage;
use App\Category;
use App\Tag;
use App\LotAttributes;

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

        //Получаем список атрибутов
        $data['attrs'] = [];
        $results = AttributeType::all();
        foreach ($results as $result) {
            $items = Attribute::where('type_id', $result->id)->get();
            $data['attrs'][] = [
                'id'    => $result->id,
                'title' => $result->title,
                'items' => $items,
            ];
        }

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
        $lot_images = new LotImage();
//        $lot_images->uploadImages($request->get('images'));
        
        $this->validate($request, [
            'title' => 'required',
            'vin' => 'required',
        ]);

        $lot_model = new Lot();
        // LotImage::add($request->all());
        
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
        $data = array();

        $data['lot'] = Lot::find($id);
        $data['categories'] = Category::pluck('title', 'id')->all();
        $data['tags'] = Tag::all();



        //Получаем список атрибутов
        $data['lot_attr'] = [];
        $results = LotAttributes::where('lot_id', $id)->get();
        if ($results) {
            foreach ($results as $result) {
                array_push($data['lot_attr'],$result->attr_id);
            }
        }
        $data['attrs'] = [];
        $results = AttributeType::all();
        foreach ($results as $result) {
            $items = Attribute::where('type_id', $result->id)->get();

            $data['attrs'][] = [
                'id'    => $result->id,
                'title' => $result->title,
                'items' => $items,
            ];
        }

        //Получаем Теги
        $data['lot_tag'] = [];
        $results = LotTag::where('lot_id', $id)->get();
        if ($results) {
            foreach ($results as $result) {
                array_push($data['lot_tag'],$result->tag_id);
            }
        }

        //Получаем ставки
        $data['bets'] = Bet::get_by_lot($id);


        return view('admin.lots.edit', $data);
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
            'vin' => 'required',
        ]);

//        dd($request);
        $lot = new Lot();
        $lot->edit($request->all(), $request->file('image'));

        \Debugbar::info($request->file('image'));

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
        Lot::remove($id);

        return redirect()->route('lots.index');
    }

}
