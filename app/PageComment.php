<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PageComment extends Model
{

    const IS_ALLOW = 1;
    protected $fillable = ['page_id', 'user_id', 'updated_at', 'descr', 'title'];


    public function page()
    {
    	return $this->belongsTo(Pages::class);
    }

    public function author()
    {
    	return $this->belongsTo(User::class, 'id');
    }

    public static function add($fields, $status = 0 )
    {
        $comments = new static;
        $comments->fill($fields);
        $comments->save();

        return $comments;
    }

    public function allow($status)
    {
        if ( !$status )
            return;

        $this->status = PageComment::IS_ALLOW;
        $this->save();
    }

    public static function getCommentPageAndAuthor()
    {
        return DB::table('page_comments')
        ->join('pages', 'page_comments.page_id', '=', 'pages.id')
        ->join('users', 'page_comments.user_id', '=', 'users.id')
        ->select('page_comments.id', 'page_comments.title', 'page_comments.updated_at as comment_date', 'pages.title as page_title', 'users.email as author')
        ->get();
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
}
