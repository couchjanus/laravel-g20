@extends('layouts.app')

@section('page')
    @include('layouts.partials.blog.header')
    <div class="w-full flex-grow mt-2 mb-10 container mx-auto">
        <div class="flex flex-col md:flex-row">
            @yield('content')
            @include('layouts.partials.blog.sidebar')
        </div>
    </div>
    @include('layouts.partials.blog.footer')
@endsection
