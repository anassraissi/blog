<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::group(['prefix'=>'admin' , 'middleware' =>'auth'] , function(){
    Route::get('/post/create',[
        'uses' => 'PostController@create',
        'as' => 'post.create'
    ]);
    Route::Post('/post/store',[
        'uses' => 'PostController@store',
        'as' => 'post.store'
    ]);
    Route::Post('/category/store',[
        'uses' => 'CategoryController@store',
        'as' => 'Category.store'
    ]);
    Route::get('/category/create',[
        'uses' => 'CategoryController@create',
        'as' => 'Category.create'
    ]);
    Route::get('/category/index',[
        'uses' => 'CategoryController@index',
        'as' => 'Category.index'
    ]);
    Route::get('/category/edit/{id}',[
        'uses' => 'CategoryController@edit',
        'as' => 'Category.edit'
    ]);
    Route::post('/category/update/{id}',[
        'uses' => 'CategoryController@update',
        'as' => 'Category.update'
    ]);
    Route::get('/category/destroy/{id}',[
        'uses' => 'CategoryController@destroy',
        'as' => 'Category.destroy'
    ]);
    Route::get('/posts',[
        'uses' => 'PostController@index',
        'as' => 'posts'
    ]);
    Route::get('/post/destroy/{id}',[
        'uses' => 'PostController@destroy',
        'as' => 'post.destroy'
    ]);
    Route::get('/post/trashed',[
        'uses' => 'PostController@trashed',
        'as' => 'post.trashed'
    ]);
    Route::get('/post/kill/{id}',[
        'uses' => 'PostController@kill',
        'as' => 'post.kill'
    ]);
    Route::get('/post/restore/{id}',[
        'uses' => 'PostController@restore',
        'as' => 'post.restore'
    ]);
    Route::get('/post/edit/{id}',[
        'uses' => 'PostController@edit',
        'as' => 'post.edit'
    ]);
    Route::post('/post/update/{id}',[
        'uses' => 'PostController@update',
        'as' => 'post.update'
    ]);
    Route::get('/home', 'HomeController@index')->name('home');

    Route::Post('/tag/store',[
        'uses' => 'TagController@store',
        'as' => 'tag.store'
    ]);
    Route::get('/tag/create',[
        'uses' => 'TagController@create',
        'as' => 'tag.create'
    ]);
    Route::get('/tag/index',[
        'uses' => 'TagController@index',
        'as' => 'tag.index'
    ]);
    Route::get('/tag/edit/{id}',[
        'uses' => 'TagController@edit',
        'as' => 'tag.edit'
    ]);
    Route::post('/tag/update/{id}',[
        'uses' => 'TagController@update',
        'as' => 'tag.update'
    ]);
    Route::get('/tag/destroy/{id}',[
        'uses' => 'TagController@destroy',
        'as' => 'tag.destroy'
    ]);

});



// Route::get('/post/create','PostController@create');
