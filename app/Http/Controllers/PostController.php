<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //

    public function index() {

        $posts = Post::all();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function show(Post $post) {

        $comments = $post->comments()->where('is_active', 1)->get();

    	return view('blog-post', ['post' => $post, 'comments' => $comments]);
    }

    public function create() {

        $categories = Category::pluck('name', 'id');

        $this->authorize('create', Post::class);

    	return view('admin.posts.create', ['categories' => $categories]);
    }

    public function store() {

        $this->authorize('create', Post::class);
    	
    	$inputs = request()->validate([
            'category_id' => 'required',
    		'title' => 'required|min:8|max:255',
    		'post_image' => 'file',
            'body' => 'required'
    	]);

    	if(request('post_image')) {
    		$inputs['post_image'] = request('post_image')->store('images');
    	}

    	auth()->user()->posts()->create($inputs);

        Session::flash('store_message', 'Post was created');

    	return redirect()->route('post.index');

    }

    public function edit(Post $post) {

        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post) {

        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title =  $inputs['title'];
        $post->body =  $inputs['body'];

        $post->save();

        Session::flash('update_message', 'Post was updated');

        return redirect()->route('post.index');

    }

    public function destroy(Post $post) {

        $post->delete();

        Session::flash('destroy_message', 'Post was deleted');

        return back();
    }
}
