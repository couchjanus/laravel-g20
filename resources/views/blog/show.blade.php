<h1>Show Blog Page</h1>

<div class="post-entry">
   <h2>{{ $post->title }}</h2>
   <p>
      <img src="{{ asset("storage/covers/blog/". $post->cover) }}">
   </p>
    
    <p>Posted By: <a href="{{ route('blog.user', $post->user->id) }}">{{ $post->user->profile->full_name }}</a> at: {{ $post->created_at }}</p>
    <p>Belongs to category: <a href="{{ route('blog.category', $post->category_id) }}">{{ $post->category->name }}</a></p>
   <div>
      {{ $post->content }}
   </div>
   <p>Likes: {{ $post->votes }} <a href="{{ route('blog.like', $post->id) }}"><button>Like</button></a></p>

    <a href="{{ route('blog.index') }}">
        All Posts <i class="icon-angle-left"></i>
    </a>

</div>

