<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholara - Virtual Classroom</title>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

<!-- Navigation -->
<nav class="bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between p-6">
        <div class="flex items-center">
        <img src="/img/2jnDJmVGCo8Jjv1cLcjio7A3NsM.svg" class="h-10 w-10 md:h-12 md:w-12" alt="Logo">
            <a class="text-2xl font-semibold text-blue-600 ml-3" href="{{ url('/') }}">
                Scholara
            </a>
        </div>
        <div class="space-x-6">
            <a class="text-gray-700 hover:text-blue-600" href="{{ url('/') }}">Home</a>
            <a class="text-gray-700 hover:text-blue-600" href="{{ url('/courses') }}">Courses</a>
            <a class="text-gray-700 hover:text-blue-600" href="{{ url('/assignments') }}">Assignments</a>
            <a class="text-gray-700 hover:text-blue-600" href="{{ url('/grades') }}">Grades</a>
            <a class="text-gray-700 hover:text-blue-600" href="{{ url('/profile') }}">Profile</a>
        </div>
        <div class="space-x-4">
            @guest
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('register') }}">{{ __('Register') }}</a>
            @else
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-blue-600 text-white py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to Scholara</h1>
        <p class="text-lg mb-8">Your Ultimate Virtual Classroom Solution</p>
        <a href="{{ url('/register') }}" class="bg-white text-blue-600 font-bold py-2 px-4 rounded hover:bg-gray-200 transition duration-300">Get Started</a>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto text-center mb-8 ">
        <h2 class="text-3xl font-bold mb-8">Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Virtual Classrooms</h3>
                <p class="text-gray-600">Engage with your students in real-time virtual classrooms.</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                    <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z"/>
                </svg>
                
                </div>
                <h3 class="text-xl font-bold mb-2">Assignments</h3>
                <p class="text-gray-600">Manage and track assignments efficiently.</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
                </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Grades</h3>
                <p class="text-gray-600">Keep track of your students' performance and grades.</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-camera-video-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2z"/>
                </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Meets</h3>
                <p class="text-gray-600">Video calls and share screen.</p>
            </div>
</section>
<!-- Call to Action Section -->
<section class="bg-blue-600 text-white py-16">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Join?</h2>
        <p class="text-lg mb-8">Sign up now and start your journey with Scholara.</p>
        <a href="{{ url('/register') }}" class="bg-white text-blue-600 font-bold py-2 px-4 rounded hover:bg-gray-200 transition duration-300">Register Now</a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto text-center">
        <p class=" text-black">&copy; {{ date('Y') }} Scholara. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
