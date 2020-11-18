<!-- Latest Posts Section -->
<x-layouts.app>
    <section class="flex flex-col justify-center items-center">
        <div class="container px-5 py-24 mx-auto">
            <x-blog.hero />
            <livewire:index-posts></livewire:index-posts>
        </div>
    </section>
</x-layouts.app>


{{-- @section('content')
    <!-- Latest Posts Section -->
    <section class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900"> Blog</h1>
                <p class="lg:w-1/2 w-full leading-relaxed text-base">
                    J'aime bien partager mes connaissances et des recherche intéressantes, pour le faire j'ai mis en place un blog personnel.
                                Nous abordons plusieurs sujets intéressants et je donne quelques astuces et conseils aux jeunes développeurs pour mieux s'en sortir.
                </p>
            </div>

            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
              @foreach($posts as $post)

                <article class="p-4 md:w-1/3 md:mb-0 mb-6 flex flex-col justify-center items-center max-w-sm mx-auto">
                    <div class="bg-gray-300 h-56 w-full rounded-lg shadow-md bg-cover bg-center" style="background-image: url({{ asset("storage/covers/blog/{$post->cover}") }}"></div>

                    <div class=" w-70 bg-white -mt-10 shadow-lg rounded-lg overflow-hidden p-5">
              
                        <div class="header-content inline-flex ">
                            <div class="category-badge flex-1  h-4 w-4 m rounded-full m-1 bg-purple-100">
                                <div class="h-2 w-2 rounded-full m-1 bg-purple-500 "></div>
                            </div>
                            <div class="category-title flex-1 text-sm"> 
                                <a href="{{ route('blog.category', $post->category_id) }}">{{ $post->category->name }}</a>
                            </div>
                        </div>
                        <div class="title-post font-medium">
                            <a href="{{ route('blog.show', $post->slug) }}" class="font-bold text-2xl hover:underline">{{ $post->title }}
                        </div>
                        <div class="summary-post text-base text-justify">
              
                            <span><a href="{{ route('blog.user', $post->user->id) }}">{{ $post->user->profile->full_name }}</a><span>
                            <span>{{ Carbon\Carbon::parse($post->published_at)->format('M d') }}</span>
                            <span class="text-gray-700">{{ $post->read_time }}</span>
                            <button class="bg-blue-100 text-blue-500 mt-4 block rounded p-2 text-sm "><a href="{{ route('blog.show', $post->slug) }}" class="rounded-full outline py-2 px-3 hover:bg-black hover:text-white border border-gray-700 hover:border-transparent transition duration-100 ease-in">Read More</a></button>
                            <button class="text-lg hover:text-red-600"><i class="far fa-heart"></i> 187</button>
                        </div>
                    </div>
                </article>

              @endforeach

                <div class="px-6 py-3">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection --}}
