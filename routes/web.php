<?php
use App\Http\Controllers\Resource;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('activities', Resource::class);