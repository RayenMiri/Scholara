@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col items-center py-12">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-8 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Classes</h2>
        
        <div class="flex justify-around mb-6">
            <button class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Join Class</button>
            <button class="bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 transition duration-300">Add Class</button>
        </div>

        @php
            $role = Auth::user()->role;
        @endphp

        @if($role == 'student')
            <div class="flex flex-col items-center">
                <input id="class-id" type="text" class="form-input w-1/2 h-10 border border-gray-300 rounded-md mb-4 p-2" name="class" placeholder="Enter Class ID" required autocomplete="class" autofocus>
                <button class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Join Class</button>
            </div>
        @else
            <div class="flex justify-center">
                <button class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Create Class</button>
            </div>
        @endif
    </div>
</div>
@endsection
