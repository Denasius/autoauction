<?php

namespace App\Http\Controllers\Admin;

use App\Providers\AppServiceProvider;
use DebugBar\DebugBar;
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
        $data = [];
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();

        $data['comments'] = PageComment::getCommentPageAndAuthor();
        //dd($data['comments']);
        return view('admin.comments.index', $data);
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
            'updated_at' => 'required',
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
        $data = [];
        $data['breadcrumb_header'] = AppServiceProvider::get_breadcrumb_header();

        $data['comment'] = PageComment::find($id);

        $data['updated_at'] = date('Y-m-d', strtotime($data['comment']->updated_at));
        $data['user_mail'] = User::find($data['comment']->user_id);
        $data['pages'] = Pages::pluck('title', 'id')->all();
        $data['users'] = User::pluck('email', 'id')->all();
        \Debugbar::info($data);
        return view('admin.comments.edit', $data);
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
            'updated_at' => 'required',
            'descr' => 'required'
        ]);

        $comment = PageComment::find($id);
        $comment->edit($request->all());

        return redirect()->route('comments.index');
    }

    public function toggle($id)
    {
        $comment = PageComment::find($id);
        $comment->toggleStatus();

        return redirect()->back();
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
