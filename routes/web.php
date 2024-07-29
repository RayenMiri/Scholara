<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;

// Landing Page Route
Route::get('/', function () {
    return view('landing');
});

// Auth Routes
Auth::routes();

//User Routes
Route::get('/users/{id}', [UserController::class, 'show']);


// Home Page Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Classrooms Routes
Route::get('/classes', [ClassroomController::class, 'index'])->middleware('auth')->name('classes.index');
Route::get('/classes/create-class', [ClassroomController::class, 'create'])->middleware('auth')->name('classes.create');
Route::get('/classes/{id}', [ClassroomController::class, 'show'])->middleware('auth')->name('classes.show');
Route::post('/classes', [ClassroomController::class, 'store'])->middleware('auth')->name('classes.store');
Route::delete('classes/{id}',[ClassroomController::class,'destroy'])->middleware('auth')->name('classes.destroy');

//Enrollements Routes
Route::post('/enrollement/join',[EnrollmentController::class,'join'])->name('enrollments.join');

//Posts Routes
Route::post('/posts',[PostController::class,'store'])->middleware('auth')->name('posts.store');
Route::post('/posts/{post_id}/like', [PostController::class, 'add_like'])->middleware('auth')->name('posts.add_like');
