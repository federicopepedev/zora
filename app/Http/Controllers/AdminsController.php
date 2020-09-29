<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Category;
use App\Comment;


use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //

    public function index() {

    	$users = User::count();
    	$posts = Post::count();
    	$categories = Category::count();
    	$comments = Comment::count();

    	return view('admin.index', ['users' => $users, 'posts'=> $posts, 'categories' => $categories, 'comments' => $comments]);
    }

}
