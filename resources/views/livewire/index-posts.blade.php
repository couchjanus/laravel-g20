<div class="container max-w-6xl mx-auto md:flex items-start py-8 px-12 md:px-0">
    <!-- articles -->
	<div class="w-full md:pr-12 mb-12">
    @forelse($this->posts as $post)
        <article class="mb-12">
            <h2 class="mb-4">
                <a href="{{ route('blog.show', $post->slug) }}" class="font-bold text-black text-xl md:text-2xl no-underline hover:underline">{{ $post->title }}
				</a>
	  	    </h2>

  		    <div class="mb-4 text-sm text-gray-700">
				by <a href="{{ route('blog.user', $post->user->id) }}" class="text-gray-700">{{ $post->user->name }}</a> on {{ Carbon\Carbon::parse($post->published_at)->format('M d') }}
				<span class="font-bold mx-1"> | </span>
				<a href="{{ route('blog.category', $post->category_id) }}" class="text-gray-700">{{ $post->category->name }}</a>
				<span class="font-bold mx-1"> | </span>
				<a href="#" class="text-gray-700">2 Comments</a>
                <span class="font-bold mx-1"> | </span>
                <span class="text-gray-700">{{ $post->read_time }}</span>
                <span class="font-bold mx-1"> | </span>
                <button class="text-lg hover:text-red-600"><i class="far fa-heart"></i> 187</button>
  		    </div>

			<div class="text-gray-700 leading-normal row flex">
                <div class="col-3 px-2 mx-2">
                <img src="{{ asset("storage/covers/blog/thumbnail/{$post->cover}") }}">
                </div>

                <div class="col-9 px-2 mx-2">
                {{ $post->category->description }}
                <button class="bg-blue-100 text-blue-500 mt-4 block rounded p-2 text-sm "><a href="{{ route('blog.show', $post->slug) }}" class="rounded-full outline py-2 px-3 hover:bg-black hover:text-white border border-gray-700 hover:border-transparent transition duration-100 ease-in">Read More</a></button>
                </div>
                
			</div>
    </article>
    
    @empty
    <p>No posts.</p>
    @endforelse
    </div>
    <!-- sidebar -->
	<div class="w-full md:w-64">
        <x-blog.sidebar />
	</div>
	<!-- /sidebar -->
</div>
