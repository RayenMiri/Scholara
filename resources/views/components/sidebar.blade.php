<div class="w-1/4 bg-gray-200 dark:bg-gray-800 h-screen p-4 overflow-y-auto">
    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Classes</h3>
    <ul class="space-y-2">
        @foreach($classes as $class)
            <li>
                <a href="{{ route('classes.show', $class->id) }}" class="block px-4 py-2 bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-600 transition duration-300">
                    {{ $class->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
