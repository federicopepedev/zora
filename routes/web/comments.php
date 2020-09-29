<?php

use Illuminate\Support\Facades\Route;

Route::get('/comments', 'CommentController@index')->name('comments.index');

Route::get('/comments/{post}/show', 'CommentController@show')->name('comments.show');

Route::put('/comments/{comment}/update', 'CommentController@update')->name('comments.update');

Route::delete('/comments/{comment}/destroy', 'CommentController@destroy')->name('comments.destroy');

Route::get('/comments/{comment}/replies', 'CommentReplyController@show')->name('replies.show');

Route::put('/replies/{reply}/update', 'CommentReplyController@update')->name('replies.update');

Route::delete('/replies/{reply}/destroy', 'CommentReplyController@destroy')->name('replies.destroy');

