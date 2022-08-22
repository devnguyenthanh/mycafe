<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'checkLogin']);
Route::get('/registration', [UserController::class, 'create']);
Route::post('/registration', [UserController::class, 'create']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth');
Route::get('/product', [UserController::class, 'index'])->middleware('auth');


Route::get('/menu', [MenuController::class, 'index'])->middleware('auth');

//shop
Route::get('/shop', [ShopController::class, 'index'])->middleware('auth');
Route::get('/shop/store', [ShopController::class, 'store'])->middleware('auth');
Route::post('/shop/store', [ShopController::class, 'store'])->middleware('auth');
Route::get('/shop/list', [ShopController::class, 'index'])->middleware('auth');
Route::get('/shop/{shop}', [ShopController::class, 'show'])->middleware('auth');
Route::post('/shop/edit/{shop}', [ShopController::class, 'update'])->middleware('auth');
Route::post('/shop/delete/{id}', [ShopController::class, 'destroy'])->middleware('auth');

//product
Route::get('/product/store', [ProductController::class, 'store'])->middleware('auth');
Route::post('/product/store', [ProductController::class, 'store'])->middleware('auth');
Route::get('/product/list', [ProductController::class, 'index'])->middleware('auth');
Route::get('/product/list/{shop}', [ProductController::class, 'show'])->middleware('auth');

//order
Route::get('/order/list', [OrderController::class, 'index'])->middleware('auth');
Route::get('/order/list/{shop}', [OrderController::class, 'show'])->middleware('auth');
Route::post('/order/store/{shop}', [OrderController::class, 'store'])->middleware('auth');
Route::post('/order/add-product', [OrderController::class, 'addProduct'])->middleware('auth');
Route::post('/order/paid/{order}', [OrderController::class, 'paid'])->middleware('auth');