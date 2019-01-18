<?php

Auth::routes(['verify' => true]);

Route::get('/','HomeController@index');
Route::get('/readmore','HomeController@readmore');

Route::get('/recipe', 'RecipeController@index')->middleware('verified');;
Route::get('/recipe/create', 'RecipeController@create');
Route::get('/recipe/search', 'RecipeController@search');
Route::post('/recipe', 'RecipeController@store');
Route::get('/recipe/edit/{kode}','RecipeController@edit');
Route::put('/recipe/{kode}','RecipeController@update');
Route::delete('/recipe/{kode}','RecipeController@destroy');

Route::get('autocomplete', 'RecipeController@autocomplete')->name('autocomplete');
Route::get('/resep/{slug}', 'HomeController@detail');
Route::get('/recipe/cari', 'HomeController@cari');

Route::get('/user', 'UserController@index');
Route::get('/user/delete/{id}', 'UserController@destroy');
Route::get('allreset', 'UserController@reset_data')->name('allreset');

