<?php

use Illuminate\Support\Facades\Route;

Route::get('/permissions', 'PermissionController@index')->name('permissions.index');

Route::post('/permissions', 'PermissionController@store')->name('permissions.store');

Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('permissions.edit');

Route::put('/permissions/{permission}/update', 'PermissionController@update')->name('permissions.update');

Route::delete('/permissions/{permission}/destroy', 'PermissionController@destroy')->name('permissions.destroy');
