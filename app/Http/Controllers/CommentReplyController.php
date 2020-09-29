<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentReplyController extends Controller
{
    //

    public function show(Comment $comment)
    {
        $replies = $comment->replies;

        return view('admin.comments.replies.show', ['replies' => $replies]);
    }

    public function store(Request $request) {

    	$userId = Auth::id();

    	request()->validate([
            'body_reply' => 'required'
        ]);

        $inputs = [
        	'user_id' => $userId,
            'comment_id' => $request->comment_id,
            'body' => $request->body_reply
        ];

        CommentReply::create($inputs);

        return back();
    }

     public function update(CommentReply $reply) {

        $reply->is_active = request('is_active');

        $reply->save();

        return back();
    }

    public function destroy(CommentReply $reply) {

        $reply->delete();

        Session::flash('reply_deleted', 'Reply has been deleted');

        return back();
    }
}
