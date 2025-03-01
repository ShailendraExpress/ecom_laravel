<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


Route::get('/login', function () {
    return view('login');
});


Route::post('/login', [UserController::class, 'login']);
Route::get('/', [ProductController::class, 'index']);

use Illuminate\Support\Facades\Session;

Route::get('/test-session', function () {
    Session::put('key', 'value');
    return session('key'); // Yeh "value" return karega agar session set ho raha hai
});