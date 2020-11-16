<!-- Sidebar Section -->
<aside class="w-full md:w-1/3 ml-1">
    <div class="w-full bg-white my-8 shadow-md">
        <div class="w-full bg-white p-4 text-lg text-gray-600">Categories</div>
        @foreach($categories as $category)
            <a href="{{ route('blog.category', [$category->id]) }}" class="w-full text-gray-600 px-4 py-5 flex items-center justify-between border-t hover:bg-gray-100">
                <span class="">{{ $category->name }}</span>
                <span class=""></span>
            </a>
        @endforeach
    </div>
</aside>