<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


Route::get('/login', function () {
    return view('login');
});


Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});


Route::post('/login', [UserController::class, 'login']);
Route::get('/', [ProductController::class, 'index']);

Route::get('detail/{id}', [ProductController::class, 'detail']);
Route::get('search', [ProductController::class, 'search']);
Route::post('add_to_cart', [ProductController::class, 'addToCart']);
Route::get('cartlist', [ProductController::class, 'cartlist']);
Route::get('checkout', [ProductController::class, 'checkout']);
Route::get('removecart/{id}', [ProductController::class, 'removeCart']);
Route::get('ordernow', [ProductController::class, 'orderNow']);
Route::post('orderplace', [ProductController::class, 'orderPlace']);
Route::get('myorders', [ProductController::class, 'myOrders']);
// Route::get('register', [UserController::class, 'register']);
Route::get('order-detail/{id}', [ProductController::class, 'orderDetail']);
Route::get('/order-confirmation', function () {
    return view('order-confirmation');
});
