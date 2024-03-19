<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::match(['get', 'post'], '/', function () {
    return view('login');
})->name('login');


Route::get('/register', function () {
    return view('register');
});


Route::post("/", [UserController::class, 'login']);
Route::post("/register", [UserController::class, 'register'])->name('register');
Route::get("/project", [UserController::class, 'project'])->name('project');
Route::get("/message", [UserController::class, 'message'])->name('message');

Route::get("/profile", [UserController::class, 'profile'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');
