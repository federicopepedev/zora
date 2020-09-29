<?php

use Illuminate\Support\Facades\Route;

Route::get('/categories', 'CategoryController@index')->name('categories.index');

Route::post('/categories', 'CategoryController@store')->name('categories.store');

Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');

Route::put('/categories/{category}/update', 'CategoryController@update')->name('categories.update');

Route::delete('/categories/{category}/destroy', 'CategoryController@destroy')->name('categories.destroy');
