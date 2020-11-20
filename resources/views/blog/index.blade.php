<!-- Latest Posts Section -->
<x-layouts.blog>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peculiar Blog') }}
        </h2>
    </x-slot>
    <section class="flex flex-col justify-center items-center">
        <div class="container px-5 py-24 mx-auto">
            <x-blog.hero />
            <livewire:index-posts></livewire:index-posts>
        </div>
    </section>
</x-layouts.blog>

