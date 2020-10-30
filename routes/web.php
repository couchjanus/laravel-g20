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

Route::get('/test', 'App\Http\Controllers\TestController@index');
Route::get('/about', 'App\Http\Controllers\AboutController@index');

Route::get('/admin', 'App\Http\Controllers\Admin\DashboardController'); 
// Route::resources('/admin/posts', 'App\Http\Controllers\Admin\PostController'); 

Route::resources([
    '/admin/users' => App\Http\Controllers\Admin\UserController::class,
    '/admin/posts' => App\Http\Controllers\Admin\PostController::class,
]);

Route::resource('blog', App\Http\Controllers\BlogController::class)->only([
    'index', 'show'
]);

Route::resource('blog', App\Http\Controllers\BlogController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

Route::resource('admin/posts', App\Http\Controllers\Admin\PostController::class)->names([
    'create' => 'posts.build'
]);

Route::resource('admin/users', App\Http\Controllers\Admin\UserController::class)->parameters([
    'users' => 'admin_user'
]);

Route::get('/contact', function (Request $request) {
    return view('contact.index');
});

Route::get('/contact/url', 'App\Http\Controllers\ContactController@url');

Route::put('/contact/{id}', [App\Http\Controllers\ContactController::class, 'update']);


Route::resource('blog', App\Http\Controllers\BlogController::class)->only([
    'index', 'show'
]);
 
 Route::resource('blog', App\Http\Controllers\PlogController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
 
Route::match(['get', 'post'], '/foobar', function () {
    return 'Hello FooBar!';
});

Route::any('foomar', function () {
    return 'Hello Foomar!';
});

// Еще какие-то маршруты....
Route::fallback(function() {
    return "Oops… How you've trapped here?";
});
