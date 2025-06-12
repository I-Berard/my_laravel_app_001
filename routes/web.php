<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;


Route::get('/signup', function() {
    return view('auth.signup');  
})->name('signup.form');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit'); // Fix typo here


Route::get('/login', function() {
    return view('auth.login');  
})->name('login.form');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});

Route::get('/', function () {
    return view('welcome');
});


// Route::middleware(['auth']->group(function () {
//     Route::resource('tasks', TaskController::class);
// }));
