<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = [
    	
    	'user_id',
        'post_id',
    	'body',
    	'is_active',
    ];

    public function replies() {

    	return $this->hasMany(CommentReply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
