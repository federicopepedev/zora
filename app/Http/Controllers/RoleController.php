<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //

    public function index() {

    	$roles = Role::all();

    	return view('admin.roles.index', ['roles' => $roles]);
    }

    public function store() {

    	request()->validate([
    		'name' => ['required']
    	]);

    	Role::create([
    		'name' => Str::ucfirst(request('name')),
    		'slug' => Str::of(Str::lower(request('name')))->slug('-')
    	]);

    	return back();

    }

    public function edit(Role $role) {

    	$permissions = Permission::all();

    	return view('admin.roles.edit', ['role'=>$role, 'permissions'=>$permissions]);
    }

    public function update(Role $role) {

    	$role->name = Str::ucfirst(request('name'));
    	$role->slug = Str::of(Str::lower(request('name')))->slug('-');

    	if($role->isDirty('name')) 
    	{

    		Session::flash('role_updated', 'Role has been updated');

    		$role->save();
    	} 
    	else 
    	{
    		Session::flash('role_updated', 'Nothing has been updated');
    	}

    	return back();
    }

    public function attach_permission(Role $role) {

    	$role->permissions()->attach(request('permission'));

    	return back();
    }

        public function detach_permission(Role $role) {

    	$role->permissions()->detach(request('permission'));

    	return back();
    }

    public function destroy(Role $role) {

    	$role->delete();

        Session::flash('role_deleted', 'Role has been deleted');

        return back();
    }
}
