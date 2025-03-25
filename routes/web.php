<?php
use App\Http\Controllers\Resource;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('activities', Resource::class);


/*
GET /activities → index
POST /activities → store
GET /activities/create → create
GET /activities/{id} → show
GET /activities/{id}/edit → edit
PUT/PATCH /activities/{id} → update
DELETE /activities/{id} → destroy
 */