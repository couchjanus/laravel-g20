<aside class="rounded shadow overflow-hidden mb-6">
    <h3 class="text-sm bg-gray-100 text-gray-700 py-3 px-4 border-b">Categories</h3>

    <div class="p-4">
        <ul class="list-reset leading-normal">
         @foreach($categories as $category)
            <li><a href="{{ route('blog.category', [$category->id]) }}" class="text-gray-darkest text-sm">{{ $category->name }}</a></li>
        @endforeach
        </ul>
    </div>
</aside>

<aside class="rounded shadow overflow-hidden mb-6">
    <h3 class="text-sm bg-gray-100 text-gray-700 py-3 px-4 border-b">Latest Posts</h3>

    <div class="p-4">
        <ul class="list-reset leading-normal">
            <li><a href="#" class="text-gray-darkest text-sm">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#" class="text-gray-darkest text-sm">Sit amet, consectetur adipisicing elit.</a></li>
            <li><a href="#" class="text-gray-darkest text-sm">Lorem ipsum dolor sit amet.</a></li>
            <li><a href="#" class="text-gray-darkest text-sm">Sit amet, consectetur adipisicing elit.</a></li>
        </ul>
    </div>
</aside>
