<h1>Blog Posts</h1>

@foreach ($posts as $post)
    <a href="{{ route('blog.show', $post->id) }}">
        <h2>{{ $post->title }}</h2>
        <p>Author Nic Name: {{ $post->user->name }}</p>
        <p>Posted By: <a href="{{ route('blog.user', $post->user->id) }}">{{ $post->user->name }}</a></p>

        <p>Author Full Name: {{ $post->user->profile->full_name }}</p>
        <p>Category: {{ $post->category->name }}</p>
        <p>Belongs to category: <a href="{{ route('blog.category', $post->category_id) }}">{{ $post->category->name }}</a></p>
    </a>
@endforeach
