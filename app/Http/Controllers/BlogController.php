<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    public function index()    {
        $posts = DB::table('posts')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'categories.name As categoryname', 'users.name As username')
            ->get();
        $categories = DB::table('categories')->get();
        return view('blog.index', compact('posts', 'categories'));
    }


    public function show($id) {
        $post = DB::table('posts')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'categories.name As categoryname', 'users.name As username')
            ->where('posts.id', $id)->first();
        // dd($post);
        return view('blog.show', compact('post'));
    }
    
    public function like($id) {
        $post = DB::table('posts')
            ->where('posts.id', $id)->increment('votes');
        return back();
    }

    // public function index()
    // {
    //     $posts = DB::table('posts')
    //     ->join('categories', 'categories.id', '=', 'posts.category_id')
    //     ->join('users', 'users.id', '=', 'posts.user_id')
    //     ->select('posts.*', 'categories.name', 'users.name As username')
    //     ->orderBy('created_at', 'desc')
    //     ->paginate();
    //     $categories = DB::table('categories')->take(30)->get();
    //     return view('blog.index', compact('posts', 'categories'));
    // }

    // public function show($id)
    // {
    //     $post = DB::table('posts')
    //     ->join('categories', 'categories.id', '=', 'posts.category_id')
    //     ->join('users', 'users.id', '=', 'posts.user_id')
    //     ->select('posts.*', 'categories.name', 'users.name As username')
    //     ->where('posts.id', $id)
    //     ->first();
    //     $hasComments = false;
    //     $categories = DB::table('categories')->take(30)->get();
    //     return view('blog.show', compact('post', 'categories', 'hasComments'));
    // }

    // public function getByCategory($id)
    // {
    //     $posts = DB::table('posts')
    //     ->join('categories', 'categories.id', '=', 'posts.category_id')
    //     ->join('users', 'users.id', '=', 'posts.user_id')
    //     ->select('posts.*', 'categories.name', 'users.name As username')
    //     ->where('category_id', '=', $id)
    //     ->orderBy('created_at', 'desc')
    //     ->get();
    //     $categories = DB::table('categories')->take(30)->get();
    //     return view('blog.index', compact('posts', 'categories'));
    // }

    // public function getByAuthor($id)
    // {
    //     $posts = DB::table('posts')
    //     ->join('categories', 'categories.id', '=', 'posts.category_id')
    //     ->join('users', 'users.id', '=', 'posts.user_id')
    //     ->select('posts.*', 'categories.name', 'users.name As username')
    //     ->where('user_id', '=', $id)
    //     ->orderBy('created_at', 'desc')
    //     ->get();
    //     $categories = DB::table('categories')->take(30)->get();
    //     return view('blog.index', compact('posts', 'categories'));
    // }
        
}
