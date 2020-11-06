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

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::get('/', 'DashboardController'); 	 
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
});

Route::get('/blog', 'App\Http\Controllers\BlogController@index');
Route::get('/blog/show/{id}', 'App\Http\Controllers\BlogController@show')->name('blog.show');
Route::get('/blog/like/{id}', 'App\Http\Controllers\BlogController@like')->name('blog.like');
Route::get('/about', 'App\Http\Controllers\AboutController@index');

Route::resource('blog', App\Http\Controllers\BlogController::class)->only([
    'index', 'show'
]);
Route::resource('blog', App\Http\Controllers\BlogController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
 
// Еще какие-то маршруты....
Route::fallback(function() {
    return "Oops… How you've trapped here?";
});
