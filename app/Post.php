<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = [

    	'user_id',
        'category_id',
    	'title',
    	'post_image',
    	'body',
    ];

    public function user() {

    	return $this->belongsTo(User::class);
    }

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function comments() {

        return $this->hasMany(Comment::class);
    }

    public function getPostImageAttribute($value)
    {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
     
        return asset('storage/' . $value);
    }

}
