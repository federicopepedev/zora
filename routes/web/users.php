<?php

use Illuminate\Support\Facades\Route;

Route::get('/users', 'UserController@index')->name('users.index');

Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');

Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');

Route::delete('/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');

Route::put('/users/{user}/attach', 'UserController@attach')->name('user.role.attach');

Route::put('/users/{user}/detach', 'UserController@detach')->name('user.role.detach');



 