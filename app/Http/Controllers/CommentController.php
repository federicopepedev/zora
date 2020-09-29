<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    //

    public function index() {

        $comments = Comment::all();

        return view('admin.comments.index', ['comments'=>$comments]);
    }

    public function show(Post $post)
    {
        $comments = $post->comments;

        return view('admin.comments.index', ['comments'=>$comments]);
    }

    public function store(Request $request) {

    	$userId = Auth::id();

    	request()->validate([
            'body' => 'required'
        ]);

        $inputs = [
        	'user_id' => $userId,
            'post_id' => $request->post_id,
            'body' => $request->body
        ];

        Comment::create($inputs);

        Session::flash('store_comment', 'Your comment is awaiting moderation.');

        return back();
    }

    public function update(Comment $comment) {

        $comment->is_active = request('is_active');

        $comment->save();

        return back();
    }

    public function destroy(Comment $comment) {

        $comment->delete();

        Session::flash('comment_deleted', 'Comment has been deleted');

        return back();
    }

}
