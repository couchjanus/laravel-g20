<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = DB::table('posts')
        //        ->orderBy('id', 'desc')
        //        ->get();
        // dump($posts);
        // Вместо использования метода count, чтобы определить, существуют ли какие-либо записи, соответствующие ограничениям запроса, вы можете использовать методы exists и doesntExist:
        return DB::table('posts')->where('category_id', 1)->exists();
        return DB::table('posts')->where('category_id', 1)->doesntExist();
        // dump(DB::table('posts')->where('category_id', 1)->get());
    }

    public function getLatestPost()    {
        $title = 'Latest Blog Post';
        $posts = DB::table('posts')->orderBy('id', 'desc')->get();
        return view('blog.index', compact('posts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = DB::table('posts')->where('id', '=', $id)->first();
        $post = DB::table('posts')->where('id', $id)->first();
        dump($post);      
    }
    // 
    public function latestPost() {
        // $post = DB::table('posts')->latest()->first();
        //  Можно передать имя столбца для сортировки по нему:
        $post = DB::table('posts')
            ->latest('title')
            ->first();
        return view('blog.show', ['post' => $post]);
    }

    public function oldestPost()  {
        $post = DB::table('posts')->oldest()->first();
        //  Можно передать имя столбца для сортировки по нему:
        $post = DB::table('posts')
            ->oldest('title')
            ->first();
        return view('blog.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
