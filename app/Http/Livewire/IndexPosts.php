<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{Post, Category, User};

class IndexPosts extends Component
{

    public function getPostsProperty()
    {
        return Post::orderBy('created_at', 'desc')->with('category')->with('user')->simplePaginate(6);
    }

    public function render()
    {
        return view('livewire.index-posts');
    }
}
