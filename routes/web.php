<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/classes',function(){
    return view('classes.classes_home_page');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
