<h1>Blog Page</h1>

<?php foreach ($posts as $post):?>

    <h2><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></h2>

    <p>{{ $post->created_at }} {{ $post->username }} {{ $post->categoryname }}</p>
     <div>
        {{ $post->content }}
    </div>
<?php endforeach?>

