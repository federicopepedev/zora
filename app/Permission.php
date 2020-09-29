<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //

    protected $fillable = [
        
    	'name',
    	'slug',

    ];

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function roles()
    {
    	return $this->belongstoMany(Role::class);
    }
}
