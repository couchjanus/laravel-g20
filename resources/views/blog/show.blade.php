@extends('layouts.blog')

@section('content')
    <div class="w-full mt-8">
        <main class="container mx-auto bg-white rounded shadow md:pt-4 pb-12 px-6 md:px-10">
            <div class="flex items-center justify-between py-6 border-b">
                <span class="text-gray-500">{{ \Carbon\Carbon::parse($post->published_at)->format('M d, Y') }}</span>
            </div>
            <h1 class="text-4xl font-bold mt-8 mb-2">{{ $post->title }}</h1>

            @isset($post->cover)
                <img src='{{ asset("storage/covers/blog/".$post->cover) }}' class="rounded-lg pt-12" title="{{ $post->title }}">
            @endisset

            <div class="flex items-center justify-between pt-4 pb-6 text-gray-700 border-b">
                <span>Category: <a href="{{ route('blog.category', $post->category_id) }}">{{ $post->category->name }}</a></span>
                            <span><a href="{{ route('blog.user', $post->user->id) }}">{{ $post->user->profile->full_name }}</a><span>
                            <span>{{ Carbon\Carbon::parse($post->published_at)->format('M d') }}</span>
                            <span class="text-gray-700">
                               {{ $post->read_time }}
                            </span>
            </div>

            <div class="text-post-content-gray font-rubik text-base leading-loose pt-6">{!! $post->content !!}</div>
            <p>Likes: {{ $post->votes }} <a href="{{ route('blog.like', $post->id) }}"><button>Like</button></a></p>
        </main>
    </div>
  

@endsection
