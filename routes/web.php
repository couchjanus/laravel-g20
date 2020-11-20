<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about');
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');

Route::group(['prefix' => 'blog', 'as' => 'blog.', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('', 'BlogController@index')->name('index');
    Route::get('/{slug}', 'BlogController@show')->name('show');
    Route::get('user/{id}', 'BlogController@postsByUser')->name('user');
    Route::get('category/{id}', 'BlogController@postsByCategory')->name('category');
    Route::get('like/{id}', 'BlogController@like')->name('like');
    
});

Route::group(['middleware'=>['auth'], 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function () {
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

Route::get('test', function (\Illuminate\Http\Request $request) {
    // $item = $request->session()->get('key');
    // dump($item);
    // $item = $request->session()->get('key', 'default value');
    // dump($item);
    session(['my-key' => 'it is in session now']);
    $item = $request->session()->get('my-key');
    dump($item);
    $items = $request->session()->all();
    foreach ($items as $item) {
        dump($item);
    }
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Еще какие-то маршруты....
Route::fallback(function() {
    return "Oops… How you've trapped here?";
});
