<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about');

Route::group(['prefix' => 'blog', 'as' => 'blog.', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('', 'BlogController@index')->name('index');
    // Route::get('/{id}', 'BlogController@show')->name('show');
    Route::get('/{slug}', 'BlogController@show')->name('show');
    Route::get('user/{id}', 'BlogController@postsByUser')->name('user');
    Route::get('category/{id}', 'BlogController@postsByCategory')->name('category');
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
    Route::resource('tags', 'TagController');
    Route::post('pictures/upload', 'PictureController@upload');
    Route::get('pictures/cropp', 'PictureController@cropp');
    Route::resource('pictures', 'PictureController');
    
});


Route::get('profiles', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
Route::get('profiles/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile.show');


Route::get('posts-by-status', function () {
    $user = \App\Models\User::find(7);
    // dump($user);
    // $posts = $user->posts;
    // dump($posts);
    $posts = $user->posts->where('status', 1)->all();
    foreach ($posts as $post) {
        dump($post);
    }
});

Route::get('posts-by-user', function () {
    $posts = App\Models\Post::where('status', 1)
    ->with('user')
    ->get();
    dump($posts);
});
 
 
// Route::get('category/{id}', 'BlogController@getByCategory');
//     Route::get('author/{id}', 'BlogController@getByAuthor');
//     Route::get('show/{id}', 'BlogController@show');
 

// Еще какие-то маршруты....
Route::fallback(function() {
    return "Oops… How you've trapped here?";
});
