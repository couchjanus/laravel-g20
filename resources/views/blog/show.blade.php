<h1>Show Blog Page</h1>

    <h2>{{ $post->title }}</h2>

    <p>{{ $post->created_at }} {{ $post->username }} {{ $post->categoryname }}</p>
     <div>
        {{ $post->content }}
    </div>
    <p>Likes: {{ $post->votes }} <a href="{{ route('blog.like', $post->id) }}"><button>Like</button></a></p>
