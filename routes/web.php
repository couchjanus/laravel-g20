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

Route::get('limit', function () {
    $posts = \DB::table('posts')
            ->offset(10)
            ->limit(5)
            ->get();
    dump($posts);
});

Route::get('chunk', function () {
    \DB::table('posts')->orderBy('id')->chunk(10, function ($posts) {
        foreach ($posts as $post) {
            dump($post);
        }
 // можете остановить обработку последующих "кусков" вернув false из Closure:
        return false;
    });
 });
 
Route::get('agr', function () {
    dump(DB::table('users')->count());
    dump(DB::table('posts')->max('updated_at'));
});

Route::get('having', function () {
    $users = DB::table('users')
           ->groupBy('id')
           ->having('id', '>', 5)
           ->get();
       dump($users);
});

Route::get('when', function () {
    $categories = collect([1, 2, 3, 4]);
    $posts = DB::table('posts')
        ->when($categories, function ($query) use ($categories) {
            return $query->whereIn('category_id', $categories);
    })->get();
    dump($posts);
});

Route::get('sort-by', function () {
    $sortBy = null;
    $users = DB::table('users')
        ->when($sortBy, function ($query) use ($sortBy) {
            return $query->orderBy($sortBy);
            }, function ($query) {
                return $query->orderBy('name');
            })->get();
    dump($users);
 });

Route::get('join', function () {
    $categories = DB::table('categories')
    ->join('posts', 'categories.id', '=', 'posts.category_id')
    ->select('categories.*', 'posts.title')
    ->get();
    dump($categories);
});

Route::get('leftjoin', function () {
    $posts = DB::table('posts')
    ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')->get();
    dump($posts);
});
Route::get('crossjoin', function () {
    $posts = DB::table('posts')
    ->crossJoin('categories')
    ->get();
    dump($posts);
});

Route::get('union', function () {
    $first = DB::table('posts')
                ->whereNull('created_at');
    $posts = DB::table('posts')
                ->whereNull('updated_at')
                ->union($first)
                ->get();
    dump($posts);
});
 
 
// Еще какие-то маршруты....
Route::fallback(function() {
    return "Oops… How you've trapped here?";
});
