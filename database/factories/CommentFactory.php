<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use App\Post;

use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

	$u_ids = App\User::pluck('id')->toArray();
	$p_ids = App\Post::pluck('id')->toArray();

    return [
        //
        'user_id' => $faker->randomElement($u_ids),
        'post_id' => $faker->randomElement($p_ids),
        'is_active' => 1,
        'body' => $faker->paragraph
    ];
});
