<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('test', function () {
    Log::info('A user has arrived at the welcome page.');
    return '<h1>Welcome back User</h1>';
});

Route::get('reminder', function () {
    return new \App\Mail\Reminder();
})->name('reminder');

Route::get('reminderhu', function () {
    return new \App\Mail\Reminder('Blahuoooo!');
})->name('reminderhu');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Еще какие-то маршруты....
Route::fallback(function() {
    return "Oops… How you've trapped here?";
});

