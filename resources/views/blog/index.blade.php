<h1>Blog Posts</h1>

@foreach ($posts as $post)
    <a href="{{ route('blog.show', $post->id) }}">
        <h2>{{ $post->title }}</h2>
    </a>
@endforeach
