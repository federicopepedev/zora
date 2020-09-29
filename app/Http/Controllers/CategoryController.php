<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    
    public function index()
    {
    	$categories = Category::all();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function store() {

    	request()->validate([
    		'name' => ['required']
    	]);

    	Category::create([
    		'name' => Str::ucfirst(request('name')),
    		'slug' => Str::of(Str::lower(request('name')))->slug('-')
    	]);

    	return back();
    }

    public function edit(Category $category) {

    	return view('admin.categories.edit', ['category'=>$category]);
    }

    public function update(Category $category) {

    	$category->name = Str::ucfirst(request('name'));
    	$category->slug = Str::of(Str::lower(request('name')))->slug('-');

    	if($category->isDirty('name')) 
    	{

    		Session::flash('category_updated', 'Category has been updated');

    		$category->save();
    	} 
    	else 
    	{
    		Session::flash('category_updated', 'Nothing has been updated');
    	}

    	return back();
    }

    public function destroy(Category $category) {

    	$category->delete();

        Session::flash('category_deleted', 'Category has been deleted');

        return back();
    }

    
}