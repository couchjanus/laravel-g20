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


Route::namespace('App\Http\Controllers\Admin')
    ->prefix('admin')
    ->as('admin.')
	->group(function () {
        Route::get('/', 'DashboardController'); 	 
        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryController');
        Route::resource('posts', 'PostController');
});

Route::get('/test', 'App\Http\Controllers\TestController@index');
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
