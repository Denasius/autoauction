<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PageComment extends Model
{

    const IS_ALLOW = 1;
    const IS_DISALLOW = 0;

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

    public function allow()
    {
        $this->status = PageComment::IS_ALLOW;
        $this->save();
    }

    public function disAllow()
    {
        $this->status = PageComment::IS_DISALLOW;
        $this->save();
    }

    public function toggleStatus()
    {
        if ( $this->status == PageComment::IS_DISALLOW ) {
            return $this->allow();
        }

        return $this->disAllow();
    }
    
    public static function getCommentPageAndAuthor()
    {
        return DB::table('page_comments')
        ->join('pages', 'page_comments.page_id', '=', 'pages.id')
        ->join('users', 'page_comments.user_id', '=', 'users.id')
        ->select('page_comments.id', 'page_comments.status', 'page_comments.title', 'page_comments.updated_at as comment_date', 'pages.title as page_title', 'users.email as author')
        ->get();
    }


    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }
}
