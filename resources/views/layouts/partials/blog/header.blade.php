<nav class="bg-white shadow mb-8 py-6">
        <div class="container mx-auto px-6 md:px-0">
            <div class="flex items-center justify-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="hidden mx-4 md:flex md:items-center">
                    <a href="#" class="block mx-4 mt-2 md:mt-0 text-sm text-gray-700 capitalize hover:text-blue-600">Home</a>
                    <a href="#" class="block mx-4 mt-2 md:mt-0 text-sm text-gray-700 capitalize hover:text-blue-600">Blog</a>
                    <a href="#" class="block mx-4 mt-2 md:mt-0 text-sm text-gray-700 capitalize hover:text-blue-600">About</a>
                    <a href="#" class="block mx-4 mt-2 md:mt-0 text-sm text-gray-700 capitalize hover:text-blue-600">Contact</a>
                </div>
                <div class="flex-1 text-right">
                    @guest
                    <a class="no-underline text-gray-700 capitalize hover:text-blue-600 text-sm p-3"
                        href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                    <a class="no-underline text-gray-700 capitalize hover:text-blue-600 text-sm p-3"
                        href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    @else
                    <span class="text-gray-700 text-sm pr-4">{{ Auth::user()->name }}</span>
                    <a class="no-underline text-gray-700 capitalize hover:text-blue-600 text-sm p-3"
                        href="{{ route('profile.show') }}"><span class="text-gray-700 text-sm pr-4"  :active="request()->routeIs('profile.show')">{{ __('Profile') }}</span></a>
                    <a href="{{ route('logout') }}" class="no-underline text-gray-700 capitalize hover:text-blue-600 text-sm p-3"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    @endguest
                </div>
            </div>
        </div>
</nav>


<!-- header -->
    {{-- <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3 ">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex justify-between items-center">
                    <div class="text-xl font-semibold text-gray-700">
                        <a href="#" class="text-gray-800 text-xl font-bold hover:text-gray-700 md:text-2xl">Brand</a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="hidden -mx-4 md:flex md:items-center">
                    <a href="#" class="block mx-4 mt-2 md:mt-0 text-sm text-gray-700 capitalize hover:text-blue-600">Home</a>
                    <a href="#" class="block mx-4 mt-2 md:mt-0 text-sm text-gray-700 capitalize hover:text-blue-600">Blog</a>
                    <a href="#" class="block mx-4 mt-2 md:mt-0 text-sm text-gray-700 capitalize hover:text-blue-600">About</a>
                    <a href="#" class="block mx-4 mt-2 md:mt-0 text-sm text-gray-700 capitalize hover:text-blue-600">Contact</a>
                </div>
            </div>
        </div>
    </nav> --}}