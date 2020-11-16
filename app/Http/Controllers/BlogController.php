<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, Category, User};

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->with('user')->simplePaginate(7);
        return view('blog.index', compact('posts'));
    }

    
    public function postsByUser($id)
    {
        $posts = Post::where([['status', 2], ['user_id', $id]])->with('category')->with('user')->simplePaginate(7);
        return view('blog.index', compact('posts'));
    }

    public function postsByCategory($id)
    {
        $posts = Post::where('category_id', $id)
            ->with('user')
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(7);
        
        return view('blog.index', compact('posts'));
    }

    public function show($slug) {
        if (is_numeric($slug)) {
            $post = Post::findOrFail($slug);
            return redirect(route('blog.show', $post->slug), 301);
        }

        $post = Post::whereSlug($slug)->with('user')->with('category')->firstOrFail();

        return view('blog.show',compact('post'));
    }
    

    public function like($id) {
        $post = Post::where('id', $id)
            ->increment('votes');
        return back();
    }
        
}
