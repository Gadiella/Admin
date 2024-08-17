<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/dashbord', function () {
        return view('dashbord');
    })->name('dashbord');
});


Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::get('/', [AuthenticationController::class, 'login'])->name('login');

Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/use_dashbord', [UserController::class, 'user_index'])->name('users.use_dashbord');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/update/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
