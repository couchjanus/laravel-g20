<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', 'App\Http\Controllers\AboutController@index');

Route::group(['prefix' => 'blog', 'as' => 'blog.', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('', 'BlogController@index')->name('index');
    Route::get('show/{id}', 'BlogController@show')->name('show');
    Route::get('like/{id}', 'BlogController@like')->name('like');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function () {
	Route::get('posts/trashed', 'PostController@trashed')->name('posts.trashed');
    Route::post('posts/restore/{id}', 'PostController@restore')->name('posts.restore');
    Route::delete('posts/force/{id}', 'PostController@force')->name('posts.force');
    Route::delete('multidelete', 'PostController@multiDelete');
    
    Route::get('/', 'DashboardController')->name('index'); 	 
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
});


Route::get('profiles', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
Route::get('profiles/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile.show');


// Route::get('category/{id}', 'BlogController@getByCategory');
//     Route::get('author/{id}', 'BlogController@getByAuthor');
//     Route::get('show/{id}', 'BlogController@show');
 

// Еще какие-то маршруты....
Route::fallback(function() {
    return "Oops… How you've trapped here?";
});
