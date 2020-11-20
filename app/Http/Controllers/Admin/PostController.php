<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Post, Category, Tag};
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Admin";
        $subtitle = "Posts";

        $posts = Post::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('title', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy("id", "desc")
        ->paginate(10);
        
        return view('admin.posts.index', compact('posts', 'title', 'subtitle'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Admin";
        $subtitle = "Add Post";
        $categories = Category::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('name', 'id');
        return view('admin.posts.create', compact('categories', 'tags', 'title', 'subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'title' => 'bail|unique:posts|max:255|required',
            'title' => 'unique:posts|max:255|required',
            'content' => 'required',
            'category_id' => 'required',
            'cover' => 'required',
        ]);
    
        // The blog post is valid...

        $post = Post::create([
            'title'=>$request->title, 
            'content'=>$request->content, 
            'category_id'=>$request->category_id, 
            'user_id' => auth()->id(),
            'cover' => $this->uploadImage($request->file("cover")),
        ]);
        $post->tags()->sync($request->input('tags', []));
        return redirect()->route('admin.posts.index');
    }


    public function uploadImage(UploadedFile $file) : string
    {
        $img = Image::make($file);
        $filename = time() . "." .$file->getClientOriginalName();
        // $file->getClientOriginalExtension();
        $originalPath = 'app/public/covers/blog';

        $img->resize(520, 250, function ($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path($originalPath)."/".$filename);
        
        $img->resize(250,125, function ($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path($originalPath)."/thumbnail/".$filename);

        return $filename;
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
        $title = "Admin";
        $subtitle = "Edit Post";
        $categories = Category::all()->pluck('name', 'id');
        $post->load('tags');
        $tags = Tag::all()->pluck('name', 'id');
        return view('admin.posts.edit')
            ->withTitle($title)
            ->withSubtitle($subtitle)
            ->withCategories($categories)
            ->withTags($tags)
            ->withPost($post);
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
        $data = [
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            // 'published_at'=>($request->published_at =='on')?1:0,
        ];

        if($request->file("cover")) {
            Storage::delete("public/covers/blog/" . $post->cover);
            Storage::delete("public/covers/blog/thumbnail/" . $post->cover);
            $data += ["cover" => $this->uploadImage($request->file("cover"))]; 
        } else {
            $data += ["cover" => $post->cover]; 
        }

        $post->update($data);
        $post->tags()->sync($request->input('tags', []));
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        $post->tags()->detach();
        Storage::delete("public/covers/blog/{$post->cover}");
        Storage::delete("public/covers/blog/thumbnail/{$post->cover}");
        $post->delete();
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
