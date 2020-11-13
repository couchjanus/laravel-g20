<h1>Blog Posts</h1>

@foreach ($posts as $post)

<div class="post-entry">
    <h2>{{ $post->title }}</h2>
    <p>
        <img src="{{ asset("storage/covers/blog/thumbnail/{$post->cover}") }}"> {{ $post->description }}
    </p>
    
    <p>Posted By: <a href="{{ route('blog.user', $post->user->id) }}">{{ $post->user->profile->full_name }}</a></p>
    <p>Belongs to category: <a href="{{ route('blog.category', $post->category_id) }}">{{ $post->category->name }}</a></p>
    <a href="{{ route('blog.show', $post->slug) }}" class="readmore">
        Read more <i class="icon-angle-right"></i>
    </a>
    <img src="{{ asset("storage/covers/blog/". $post->cover) }}">
</div>

@endforeach
