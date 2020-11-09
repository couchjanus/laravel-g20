<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Post, Category};

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Admin";
        $subtitle = "Posts";
        // $posts = Post::all();
        // $posts = Post::paginate();
        // $posts = Post::paginate(10);
        $posts = Post::paginate(10);

        // $posts = Post::where([
        //     ['title', '!=', Null],
        //     [function ($query) use ($request) {
        //         if (($term = $request->term)) {
        //             $query->orWhere('title', 'LIKE', '%' . $term . '%')->get();
        //         }
        //     }]
        // ])
        //     ->orderBy("id", "desc")
        //     ->paginate(10);
        
        return view('admin.posts.index', compact('posts', 'title', 'subtitle'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create(['title'=>$request->title, 'content'=>$request->content, 'category_id'=>$request->category_id, 'user_id'=>1]);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.posts.edit')->withCategories($categories)->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'published'=>($request->published =='on')?1:0,
            ]);
        
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        $post->delete();
        // Post::destroy(1);
        // Post::destroy([1, 2, 3]);
        // Post::where('status', 0)->delete();
        return redirect()->route('admin.posts.index');
    }

    public function multiDelete(Request $request)
    {
        $ids = $request->ids;
        foreach ($ids as $id) 
        {
            Post::where('id', $id)->delete();
        }
        return redirect()->route('admin.posts.index');
    }

    // trashed
    public function trashed()
    {
        $title = "Admin";
        $subtitle = "Trashed Post List";
        $posts = Post::onlyTrashed()->paginate();
        return view('admin.posts.trashed', compact('posts', 'title', 'subtitle'));
    }

    public function restore($id)
    {
        Post::withTrashed()
            ->where('id', $id)
            ->first()
            ->restore();

        return redirect(route('admin.posts.trashed'));
    }

    public function deletePermanently($id)
    {
        $post = Post::withTrashed()
            ->findOrFail($id);
        $post->forceDelete();
        return redirect()->route('admin.posts.index');
    }

    public function force($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();  
        $post->forceDelete();
        return redirect()->route('admin.posts.index');
    }
}
