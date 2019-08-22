<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Attribute extends Model
{

    protected $fillable = ['title', 'category_id'];

    // public function lots()
    // {
    //     return $this->belongsToMany(
    //         LotAttributes::class,
    //         'lot_attributes',
    //         'attr_id',
    //         'lot_id'
    //     );
    // }


    //Получаем все атрибуты с их типами
    public static function get_all(){
        return DB::table('attributes')
            ->orderBy('attribute_categories.type')
            ->orderBy('attributes.category_id')
            ->join('attribute_categories', 'attributes.category_id', '=', 'attribute_categories.id')
            ->select('attributes.*', 'attribute_categories.title as type_title', 'attribute_categories.type as type_type')
            ->get();
    }

    public static function getAllAttributeCategories($filter = false)
    {
        if ( $filter ) {
            return DB::table('attribute_categories')
                ->orderBy('attribute_categories.id')
                ->select('attribute_categories.id', 'attribute_categories.title', 'attribute_categories.add_filter', 'attribute_categories.type')
                ->where('attribute_categories.add_filter', 'on')
                ->get();
        }else{

            return DB::table('attribute_categories')
                ->orderBy('attribute_categories.id')
                ->select('attribute_categories.id', 'attribute_categories.title', 'attribute_categories.add_filter', 'attribute_categories.type')
                ->get();
        }
        
    }

    public static function getTreeAttrCategoies($filter = false)
    {
        $item = new static;
        $categories = $item::getAllAttributeCategories($filter);
        $attributes = $item::get_all();
        $attributesTree = [];

        foreach ($categories as $cat) {
            
            foreach ( $attributes as $attr ) {

                if ( $cat->id === $attr->category_id ) {
                    $attributesTree[$cat->title][] = [
                        'id' => $attr->id,
                        'title' => $attr->title
                    ];
                }
            }
            // $filter = $cat->add_filter;
            // $attributesTree[$cat->title][] = $filter; 
        }
        return $attributesTree;
    }
    
    //Получаем все атрибутоы по типу
    public function get_attribute_by_type($type) {

        return DB::table('attributes')
            ->orderBy('attributes.category_id')
            ->join('attribute_categories', 'attributes.category_id', '=', 'attribute_categories.id')
            ->select('attributes.*', 'attribute_categories.title as type_title', 'attribute_categories.type as type_type')
            ->where('attributes.category_id', $type)
            ->get();
    }


    public function add($fields) {
        $Attribute = new Attribute();
        $Attribute->fill($fields);
        $Attribute->save();
        return true;
    }

    public function edit($fields){
        $Attribute = Attribute::find($fields['id']);
        $Attribute->fill($fields);
        $Attribute->save();
    }
    
}