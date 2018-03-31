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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){
    Route::get('/posts/create', [
            'uses' => 'PostController@create',
            'as'   => 'posts.create']
    );

    Route::get('/posts/', [
            'uses' => 'PostController@index',
            'as'   => 'posts']
    );

    Route::get('/posts/trashed', [
            'uses' => 'PostController@trashed',
            'as'   => 'posts.trashed']
    );

    Route::get('/posts/kill/{id}', [
            'uses' => 'PostController@kill',
            'as'   => 'posts.kill']
    );

    Route::get('/posts/restore/{id}', [
            'uses' => 'PostController@restore',
            'as'   => 'posts.restore']
    );

    Route::get('/posts/{id}', [
            'uses' => 'PostController@destroy',
            'as'   => 'posts.delete']
    );

    Route::post('/posts/store', [
            'uses' => 'PostController@store',
            'as'   => 'posts.store']
    );

    Route::get('/category/create', [
            'uses' => 'CategoryController@create',
            'as'   => 'category.create']
    );

    Route::post('/category/store', [
            'uses' => 'CategoryController@store',
            'as'   => 'category.store']
    );

    Route::get('/category', [
            'uses' => 'CategoryController@index',
            'as'   => 'category']
    );

    Route::get('/category/delete/{id}', [
            'uses' => 'CategoryController@destroy',
            'as'   => 'category.delete']
    );
    Route::get('/category/edit/{id}', [
            'uses' => 'CategoryController@edit',
            'as'   => 'category.edit']
    );

    Route::post('/category/edit/{id}', [
            'uses' => 'CategoryController@update',
            'as'   => 'category.update']
    );

    Route::post('/tag', [
            'uses' => 'TagController@store',
            'as'   => 'tag.store']
    );

    Route::post('/tag/update/{id}', [
            'uses' => 'TagController@update',
            'as'   => 'tag.update']
    );

    Route::get('/tag/edit/{id}', [
            'uses' => 'TagController@edit',
            'as'   => 'tag.edit']
    );

    Route::get('/tag', [
            'uses' => 'TagController@index',
            'as'   => 'tag']
    );

    Route::get('/tag/create', [
            'uses' => 'TagController@create',
            'as'   => 'tag.create']
    );

    Route::get('/tag/delete/{id}', [
            'uses' => 'TagController@destroy',
            'as'   => 'tag.delete']
    );



});