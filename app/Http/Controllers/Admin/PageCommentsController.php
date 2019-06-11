<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PageComment;
use App\Pages;
use App\User;

class PageCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = PageComment::getCommentPageAndAuthor();
        return view('admin.comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pages'] = Pages::pluck('title', 'id')->all();
        $data['users'] = User::pluck('email', 'id')->all();
        return view('admin.comments.create', $data);
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
            'created_at' => 'required',
            'descr' => 'required'
        ]);

        $comment = PageComment::add($request->all());
        $comment->allow($request->get('status'));
        return redirect()->route('comments.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = PageComment::find($id);
        $pages = Pages::pluck('title', 'id')->all();
        $users = User::pluck('email', 'id')->all();
        return view('admin.comments.edit', [
            'comment' => $comment,
            'pages' => $pages,
            'users' => $users
        ]);
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
            'created_at' => 'required',
            'descr' => 'required'
        ]);

        $comment = PageComment::find($id);
        $comment->edit($request->all());

        return redirect()->route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PageComment::find($id)->delete();
        return redirect()->route('comments.index');
    }
}
