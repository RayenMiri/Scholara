<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Scholara') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite('resources/css/app.css')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <div id="app">
        <nav class="bg-white shadow-md">
            <div class="container mx-auto flex items-center justify-between p-4">
                <div class="flex items-center space-x-2">
                    <img src="/img/2jnDJmVGCo8Jjv1cLcjio7A3NsM.svg" class="h-10 w-10 md:h-12 md:w-12" alt="Logo">
                    <a class="text-2xl font-semibold text-blue-600" href="{{ url('/') }}">
                        Scholara
                    </a>
                </div>

                <div class="hidden md:flex space-x-6" id="navbarSupportedContent">
                    <a class="text-gray-700 hover:text-blue-600" href="{{ url('/') }}">Home</a>
                    <a class="text-gray-700 hover:text-blue-600" href="{{ url('/classes') }}">Classes</a>
                    <a class="text-gray-700 hover:text-blue-600" href="{{ url('/assignments') }}">Assignments</a>
                    <a class="text-gray-700 hover:text-blue-600" href="{{ url('/grades') }}">Grades</a>
                    <a class="text-gray-700 hover:text-blue-600" href="{{ url('/calendar') }}">Calendar</a>
                    <a class="text-gray-700 hover:text-blue-600" href="{{ url('/students') }}">Students</a>
                    <a class="text-gray-700 hover:text-blue-600" href="{{ url('/profile') }}">User Profile</a>

                    <div class="flex items-center space-x-4">
                        

                        @guest
                            @if (Route::has('login'))
                                <a class="text-gray-700 hover:text-blue-600" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="text-gray-700 hover:text-blue-600" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <div class="relative">
                                <button class="text-gray-700 hover:text-blue-600 flex items-center space-x-2" id="user-menu-button">
                                    <span>{{ Auth::user()->name }}</span>
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10 hidden" id="dropdown-menu">
                                    <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-8">
            <div class="container mx-auto px-4">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Dropdown Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userMenuButton = document.getElementById('user-menu-button');
            const dropdownMenu = document.getElementById('dropdown-menu');

            if (userMenuButton && dropdownMenu) {
                userMenuButton.addEventListener('click', function () {
                    dropdownMenu.classList.toggle('hidden');
                });
            }

            // Hide dropdown if clicked outside
            document.addEventListener('click', function (event) {
                if (!userMenuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
