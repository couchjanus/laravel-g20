<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('home.index') }}" :active="request()->routeIs('home.index`')">
                        {{ __('Home') }}
                    </x-jet-nav-link>
                </div>
            </div>
		
            <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <div class="hidden mx-4 md:flex md:items-center">
                    <x-jet-nav-link href="{{ route('blog.index') }}" :active="request()->routeIs('blog.index')">
                        {{ __('Blog') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                        {{ __('About') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                        {{ __('Contact') }}
                    </x-jet-nav-link>

                    @if (Route::has('login'))
                        @auth
                            <x-jet-nav-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                            </x-jet-nav-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-nav-link>
                            </form>
                        @else
                            <x-jet-nav-link href="{{ route('login') }}">
                            {{ __('Login') }}
                            </x-jet-nav-link>
                            @if (Route::has('register'))
                                    <x-jet-nav-link href="{{ route('register') }}">
                                    {{ __('Register') }}
                                    </x-jet-nav-link>
                            @endif
                        @endif
                    @endif
                    
                    
                </div>
                
		    </div>
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

</nav>