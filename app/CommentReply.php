<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    
    protected $fillable = [
        
        'user_id',
    	'comment_id',
    	'body',
    	'is_active',
    ];

    public function comment() {

    	return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
