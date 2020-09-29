<?php

use Illuminate\Support\Facades\Route;

Route::get('/roles', 'RoleController@index')->name('roles.index');

Route::post('/roles', 'RoleController@store')->name('roles.store');

Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit');

Route::put('/roles/{role}/update', 'RoleController@update')->name('roles.update');

Route::delete('/roles/{role}/destroy', 'RoleController@destroy')->name('roles.destroy');

Route::put('/roles/{role}/attach', 'RoleController@attach_permission')->name('role.permission.attach');

Route::put('/roles/{role}/detach', 'RoleController@detach_permission')->name('role.permission.detach');
