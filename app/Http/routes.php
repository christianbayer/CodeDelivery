<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'CategoriesController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
