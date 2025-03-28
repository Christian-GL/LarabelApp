<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Resource;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Rutas de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Tus rutas resource anteriores
Route::resource('activities', Resource::class);
Route::resource('users', UserController::class);
Route::resource('contacts', ContactController::class);

// Rutas de Dashboard y perfil (Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticación (Breeze)
require __DIR__.'/auth.php';
