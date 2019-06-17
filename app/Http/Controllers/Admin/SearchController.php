<?php

namespace App\Http\Controllers\Admin;

use App\Search;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public static function get(Request $request) {

        $data = [];
        $data['pages'] = [];
        $data['categories'] = [];
        $data['lots'] = [];
        $data['tags'] = [];
        $data['attributes'] = [];

        $results = Search::get_results_admin($request->all());

        if ($results['pages']){
            foreach($results['pages'] as $item) {
                $data['pages'][] = [
                    'id'    => $item->id,
                    'title' => $item->title,
                ];
            }
        }

        if ($results['categories']){
            foreach($results['categories'] as $item) {
                $data['categories'][] = [
                    'id'    => $item->id,
                    'title' => $item->title,
                ];
            }
        }

        if ($results['lots']){
            foreach($results['lots'] as $item) {
                $data['lots'][] = [
                    'id'    => $item->id,
                    'title' => $item->title,
                ];
            }
        }

        if ($results['tags']){
            foreach($results['tags'] as $item) {
                $data['tags'][] = [
                    'id'    => $item->id,
                    'title' => $item->title,
                ];
            }
        }

        if ($results['attributes']){
            foreach($results['attributes'] as $item) {
                $data['attributes'][] = [
                    'id'    => $item->id,
                    'title' => $item->title,
                ];
            }
        }



//        $data['results'] = $results;
        return view('admin.common.result_search', $data);
    }
}
