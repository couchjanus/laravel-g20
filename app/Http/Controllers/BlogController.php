<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, Category, User};

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 2)->with('category')->with('user')->get();
        // dump($posts);
        return view('blog.index', compact('posts'));
    }

    
    public function postsByUser($id)
    {
        $posts = Post::where([['status', 2], ['user_id', $id]])->with('category')->with('user')->get();
        return view('blog.index', compact('posts'));
    }

    public function postsByCategory($id)
    {
        $posts = Post::where('category_id', $id)
            ->with('user')
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->simplePaginate();
        
        return view('blog.index', compact('posts'));
    }
 

    public function show($id) {
        $post = Post::where('id', $id)
            ->with('user')
            ->with('category')
            ->first();
        // dd($post);
        return view('blog.show', compact('post'));
    }
    
    public function like($id) {
        $post = Post::where('id', $id)
            ->increment('votes');
        return back();
    }
        
}
