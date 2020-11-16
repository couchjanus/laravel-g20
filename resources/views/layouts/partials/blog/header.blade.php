<header class="w-full bg-white shadow-md z-10">
    <div x-data="{ open: false }" class="container mx-auto">
        <nav class="flex justify-center items-center py-4 hidden md:flex">
            <div class="w-1/2 flex justify-around text-gray-600">
                <a href="{{ route('blog.index') }}" class="px-3 py-2 hover:underline">Blog</a>
                <div class="blog-menu px-3 py-2">
                    <a href="#" class="relative hover:underline">
                        Categories
                        <i class="icon-chevron-down ml-1"></i>
                    </a>
                </div>
                <a href="{{ route('about') }}" class="px-3 py-2 hover:underline">About</a>
                <a href="#" class="px-3 py-2 hover:underline">Contact</a>
            </div>
        </nav>
    </div>
</header>