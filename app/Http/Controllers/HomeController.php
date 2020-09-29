<?php

namespace App\Http\Controllers;

Use App\Post;
Use App\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();

        $categories = Category::all();

        return view('home', ['posts' => $posts, 'categories'=> $categories]);
    }
}
