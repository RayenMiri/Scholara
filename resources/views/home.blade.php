@extends('layouts.app')

@section('content')
<div class="flex justify-center min-h-screen bg-gray-100 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl w-full space-y-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-blue-600 text-white p-4 text-xl font-semibold">
                {{ __('Dashboard') }}
            </div>

            <div class="p-6">
                <p class="text-gray-700 text-lg boder border-green-50">
                    {{ __('You are logged in!') }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
