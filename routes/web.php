<?php
use App\Http\Controllers\Resource;
use App\Http\Controllers\UserController;
use App\Http\Controller\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('activities', Resource::class);
Route::resource('users', UserController::class);
Route::resource('contacts', ContactController::class);