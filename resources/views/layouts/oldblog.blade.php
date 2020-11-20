<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
    </head>
    <body class="font-sans antialiased">
        
            @include('layouts.partials.blog.header')
            <main class="mt-10">
                <div class="w-full bg-cover bg-center" style="height:32rem; background-image: url(/img/bg);">
                    <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-50">
                        <div class="text-center">
                            <h1 class="text-white text-2xl font-semibold uppercase md:text-3xl">Build Your new <span class="underline text-blue-400">Saas</span></h1>
                            <button class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">Start project</button>
                        </div>
                    </div>
                </div>
            
            <!-- Narrower side column -->
            <div class="flex flex-col lg:flex-row lg:space-x-12 mx-auto">
                    @yield('content')
                    @include('layouts.partials.blog.sidebar')
            </div>
            </main>
            <!-- main ends here -->
            @include('layouts.partials.blog.footer')
    </body>
</html>
