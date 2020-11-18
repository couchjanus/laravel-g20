<!-- Sidebar Section -->
<aside class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
    <div class="p-4 border-t border-b md:border md:rounded">
            <div class="flex py-2">
              <img src="/img/avatar.png"
                class="h-10 w-10 rounded-full mr-2 object-cover" />
              <div>
                <p class="font-semibold text-gray-700 text-sm"> Charly Root </p>
                <p class="font-semibold text-gray-600 text-xs"> Editor </p>
              </div>
            </div>
            <p class="text-gray-700 py-3">
              Charly writes about technology
              Yourself required no at thoughts delicate landlord it be. Branched dashwood do is whatever it.
            </p>
            <button class="px-2 py-1 text-gray-100 bg-green-700 flex w-full items-center justify-center rounded">
              Follow 
              <i class='bx bx-user-plus ml-2' ></i>
            </button>
    </div>
    
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