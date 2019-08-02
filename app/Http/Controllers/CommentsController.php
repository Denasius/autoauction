<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\PageComment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'message' 	=> 'required'
    	]);

    	$comment = new PageComment;
    	$comment->descr = $request->get('message');
    	$comment->page_id = $request->get('post_id');
    	$comment->user_id = Auth::user()->id;
    	$comment->title = $request->get('title');
    	$comment->save();

    	return redirect()->back()->with('success_comment', 'Спасибо за Ваш комметнтарий! После модерации он будет добавлен');
    }
}
