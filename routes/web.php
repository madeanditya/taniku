<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'main']);

Route::get('/user/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/user/register', [UserController::class, 'store']);
Route::get('/user/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/user/login', [UserController::class, 'authenticate']);
Route::post('/user/logout', [UserController::class, 'logout']);

Route::get('/product/create'  , [ProductController::class, 'create'])->middleware('auth');
Route::post('/product/create', [ProductController::class, 'store']);
Route::get('/product/read'  , [ProductController::class, 'read'])->middleware('auth');
Route::get('/product/update/{id}'  , [ProductController::class, 'update'])->middleware('auth');
Route::post('/product/update/{id}', [ProductController::class, 'restore']);
Route::post('/product/delete/{id}', [ProductController::class, 'destroy']);
