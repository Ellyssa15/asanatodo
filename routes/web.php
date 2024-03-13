<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/register', function () {
    return view('auth.register');
});


Route::post("/", [UserController::class, 'login']);
Route::post("/register", [UserController::class, 'register'])->name('register');
Route::get("/project", [UserController::class, 'project'])->name('project');
Route::get("/message", [UserController::class, 'message'])->name('message');
Route::get("/profile", [UserController::class, 'profile'])->name('profile');

