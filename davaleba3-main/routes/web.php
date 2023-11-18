<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/post/{post?}', [PostController::class, "createOrUpdate"])->name('post');

Route::get('/name', function () {
    return "giorgi";
});

Route::get('lastname', function () {
    return "kveladze";
});

Route::get('age', function () {
    return "20";
});

Route::get('hobi', function () {
    return "rame";
});

Route::get('faculty', function () {
    return "IT";
});

Route::delete('users/{id}', function ($id) {
    return response()->json([
        "msg"=> "warmatebit waishala"
    ]);
});

rame