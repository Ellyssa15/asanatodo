<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\NotepadController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ForgetPasswordController;

require __DIR__ . '/auth.php';

Route::match(['get', 'post'], '/', function () {
    return view('login');
})->name('login');

Route::post("/", [UserController::class, 'login']);

Route::get('/dashboard', [UserController::class, 'list'])->name('dashboard');

Route::get('/test', [TestController::class, 'index']);
Route::resource('test', TestController::class);

# Notepad
Route::get("/notepad", [NotepadController::class, 'notepad'])->name('notepad');
Route::post('notes', [NotepadController::class, 'store'])->name('notepad.store');
Route::put('/notes_update/{id}', [NotepadController::class, 'update'])->name('notepad.update');
Route::delete('/notes/{id}', [NotepadController::class, 'destroy'])->name('notepad.destroy');

# Task
Route::post('/task', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/addtasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/task', [TaskController::class, 'list'])->name('task');
Route::delete('/delete_task/{id}', [TaskController::class, 'delete_task']);
Route::put('/update_task/{id}', [TaskController::class, 'update_task']);

# Staff
Route::get('/staff', [StaffController::class, 'index'])->name('staff');
Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
Route::get('/staff/{user}/edit', [StaffController::class, 'edit'])->name('staffedit');
Route::put('/staff/{user}', [StaffController::class, 'update'])->name('staff.update');
Route::delete('/staff/{user}', [StaffController::class, 'destroy'])->name('staff.destroy');
