<?php

Route::namespace('Core')->group(function () {
    Route::get('/', 'FrontendController@home');
});

Route::group(['namespace' => 'Resource', 'middleware' => 'admin'], function () {
    Route::resource('/books', 'BookController')->except('index', 'show');
    Route::resource('/genres', 'GenreController')->except('show');
});

Route::namespace('Resource')->group(function () {
    Route::get('/books/{book}', 'BookController@show');
    Route::patch('/books/{book}/reserve', 'BookController@reserve');
    Route::patch('/books/{book}/return', 'BookController@returnBack');
});

Auth::routes();
