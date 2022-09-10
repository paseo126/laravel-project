<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [LoginController::class, 'index']);

Route::post('/login', [LoginController::class, 'authenticate']);


Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dasboard', [ProdukController::class, 'index']);

Route::get('/product/details/{id}', [ProdukController::class, 'show']);

// keranjang

Route::post('/cart/add', [CartController::class,'store']);

Route::get('/dasboard/cart/edit/{id}', [CartController::class,'show']);

Route::post('/cart/edit/{id}', [CartController::class,'update']);

Route::get('/dasboard/cart', [CartController::class, 'index']);

Route::get('/dasboard/cart/delete/{id}', [CartController::class, 'destroy']);


// riwayat

Route::post('/dasboard/belanja', [BelanjaController::class, 'store']);

Route::get('/dasboard/riwayat', [BelanjaController::class, 'index']);
