<?php

namespace App\Http\Controllers;

use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //

    public function index() {

    	$permissions = Permission::all();

    	return view('admin.permissions.index', ['permissions'=>$permissions]);
    }

    public function store() {

    	request()->validate([
    		'name' => ['required']
    	]);

    	Permission::create([
    		'name' => Str::ucfirst(request('name')),
    		'slug' => Str::of(Str::lower(request('name')))->slug('-')
    	]);

    	return back();

    }

    public function edit(Permission $permission) {

    	return view('admin.permissions.edit', ['permission'=>$permission]);
    }

    public function update(Permission $permission) {

    	$permission->name = Str::ucfirst(request('name'));
    	$permission->slug = Str::of(Str::lower(request('name')))->slug('-');

    	if($permission->isDirty('name')) 
    	{

    		Session::flash('permission_updated', 'Permission has been updated');

    		$permission->save();
    	} 
    	else 
    	{
    		Session::flash('permission_updated', 'Nothing has been updated');
    	}

    	return back();
    }

    public function destroy(Permission $permission) {

    	$permission->delete();

        Session::flash('permission_deleted', 'Permission has been deleted');

        return back();
    }
}
