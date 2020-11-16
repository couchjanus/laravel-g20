@extends('layouts.app')

@section('page')
    @include('layouts.partials.blog.header')

    <!-- Narrower side column -->
    <div class="w-full flex-grow flex mb-4">
            @yield('content')
            @include('layouts.partials.blog.sidebar')
    </div>

    @include('layouts.partials.blog.footer')
   
@endsection
