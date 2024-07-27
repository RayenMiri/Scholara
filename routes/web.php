<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EnrollmentController;


// Landing Page Route
Route::get('/', function () {
    return view('landing');
});

// Auth Routes
Auth::routes();

// Home Page Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Classrooms Routes
Route::get('/classes', [ClassroomController::class, 'index'])->name('classes.index');
Route::get('/classes/create-class', [ClassroomController::class, 'create'])->name('classes.create');
Route::get('/classes/{id}', [ClassroomController::class, 'show'])->name('classes.show');
Route::post('/classes', [ClassroomController::class, 'store'])->name('classes.store');
Route::delete('classes/{id}',[ClassroomController::class,'destroy'])->name('classes.destroy');

//Enrollements Routes

Route::post('/enrollement/join',[EnrollmentController::class,'join'])->name('enrollments.join');