<?php

use App\User;
use App\Post;
use App\Category;
use App\Role;
use App\Permission;
use App\Comment;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'username'=> 'admin',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $roles = [
            ['name' => 'Admin', 'slug' =>'admin'],
            ['name' => 'Moderator', 'slug' =>'moderator'],
            ['name' => 'Author', 'slug' =>'author'],
            ['name' => 'Subscriber', 'slug' =>'subscriber'],
        ];

        $permissions = [
            ['name' => 'View Dashboard', 'slug' =>'view-dashboard'],
            ['name' => 'Edit Post', 'slug' =>'edit-post'],
        ];

        $categories = [
            ['name' => 'News', 'slug' => 'news'],
            ['name' => 'Entertainment', 'slug' =>'entertainment'],
            ['name' => 'Business', 'slug' =>'business'],
            ['name' => 'Art', 'slug' =>'art'],
            ['name' => 'Education', 'slug' =>'education'],
        ];

        foreach ($roles as $role) {
        Role::create($role);
        }

        foreach ($permissions as $permission) {
        Permission::create($permission);
        }

        foreach ($categories as $category) {
        Category::create($category);
        }

        factory(User::class, 20)->create()->each(function($user){
            $user->posts()->save(factory(Post::class)->make());
        });

        factory(Comment::class, 20)->create();

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
