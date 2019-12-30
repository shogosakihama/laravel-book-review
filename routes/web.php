<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/articles');
});

Route::get('/articles','ArticleController@index')->name('article.list');
Route::get('/article/new','ArticleController@create')->name('article.new');
Route::post('/article/new','ArticleController@searchCover')->name('article.searchCover');
Route::post('/article', 'ArticleController@store')->name('article.store');


Route::get('/article/edit/{id}', 'ArticleController@edit')->name('article.edit');
Route::post('/article/update/{id}', 'ArticleController@update')->name('article.update');

Route::get('/article/getCover','PostController@getCover')->name('article.getCover');
Route::post('/article/getCover','PostController@getCover');

Route::get('/article/test','ArticleController@test');


Route::get('/article/{id}','ArticleController@show')->name('article.show');
Route::delete('/article/{id}','ArticleController@destroy')->name('article.delete');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
