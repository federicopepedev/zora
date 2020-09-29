<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Post;
use App\Category;

use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

	$c_ids = App\Category::pluck('id')->toArray();

    return [
        //
        'user_id' => factory(User::class),
        'category_id' => $faker->randomElement($c_ids),
        'title' => $faker->sentence,
        'post_image' => $faker->imageUrl('900', '300'),
        'body' => $faker->paragraph
    ];
});
