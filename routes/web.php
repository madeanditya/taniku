<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

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
Route::get('/taniku', [HomeController::class, 'taniku']);
Route::get('/{username}', [HomeController::class, 'user']);
Route::get('/home/product/{id}', [HomeController::class, 'product']);

Route::get('/user/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/user/register', [UserController::class, 'store'])->middleware('guest');
Route::get('/user/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/user/login', [UserController::class, 'authenticate'])->middleware('guest');
Route::post('/user/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/user/settings', [UserController::class, 'settings'])->middleware('auth');

Route::get('/address/create', [AddressController::class, 'create'])->middleware('auth');
Route::post('/address/store', [AddressController::class, 'store'])->middleware('auth');
Route::get('/address/show', [AddressController::class, 'show'])->middleware('auth');
Route::get('/address/edit/{id}', [AddressController::class, 'edit'])->middleware('auth'); // cek session
Route::post('/address/update/{id}', [AddressController::class, 'update'])->middleware('auth');
Route::get('/address/destroy/{id}', [AddressController::class, 'destroy'])->middleware('auth'); // cek session
Route::get('/address/default/{id}', [AddressController::class, 'default'])->middleware('auth'); // cek session

Route::get('/product/create'  , [ProductController::class, 'create'])->middleware('auth');
Route::post('/product/store', [ProductController::class, 'store'])->middleware('auth');
Route::get('/product/show' , [ProductController::class, 'show'])->middleware('auth');
Route::get('/product/edit/{id}' , [ProductController::class, 'edit'])->middleware('auth'); // cek session
Route::post('/product/update/{id}', [ProductController::class, 'update'])->middleware('auth');
Route::get('/product/destroy/{id}', [ProductController::class, 'destroy'])->middleware('auth'); // cek session

Route::get('/customer_order/show/{status}', [CustomerOrderController::class, 'show'])->middleware('auth');
Route::get('/customer_order/accept/{id}', [CustomerOrderController::class, 'accept'])->middleware('auth'); // cek session
Route::get('/customer_order/reject/{id}', [CustomerOrderController::class, 'reject'])->middleware('auth'); // cek session
Route::get('/customer_order/deliver/{id}', [CustomerOrderController::class, 'deliver'])->middleware('auth'); // cek session
Route::get('/customer_order/arrive/{id}', [CustomerOrderController::class, 'arrive'])->middleware('auth'); // cek session
Route::get('/customer_order/apply_cancel_request/{id}', [CustomerOrderController::class, 'apply_cancel_request'])->middleware('auth'); // cek session
Route::get('/customer_order/cancel_cancel_request/{id}', [CustomerOrderController::class, 'cancel_cancel_request'])->middleware('auth'); // cek session
Route::get('/customer_order/accept_cancel_request/{id}', [CustomerOrderController::class, 'accept_cancel_request'])->middleware('auth'); // cek session
Route::get('/customer_order/reject_cancel_request/{id}', [CustomerOrderController::class, 'reject_cancel_request'])->middleware('auth'); // cek session

Route::post('/order/store', [OrderController::class, 'store'])->middleware('auth');
Route::get('/order/show/{status}', [OrderController::class, 'show'])->middleware('auth');
Route::get('/order/pay/{id}', [OrderController::class, 'pay'])->middleware('auth'); // cek session
Route::get('/order/cancel/{id}', [OrderController::class, 'cancel'])->middleware('auth'); // cek session
Route::get('/order/confirm/{id}', [OrderController::class, 'confirm'])->middleware('auth'); // cek session
Route::get('/order/complaint/{id}', [OrderController::class, 'complaint'])->middleware('auth'); // cek session
Route::get('/order/apply_cancel_request/{id}', [OrderController::class, 'apply_cancel_request'])->middleware('auth'); // cek session
Route::get('/order/cancel_cancel_request/{id}', [OrderController::class, 'cancel_cancel_request'])->middleware('auth'); // cek session
Route::get('/order/accept_cancel_request/{id}', [OrderController::class, 'accept_cancel_request'])->middleware('auth'); // cek session
Route::get('/order/reject_cancel_request/{id}', [OrderController::class, 'reject_cancel_request'])->middleware('auth'); // cek session

Route::get('/cart/store/{id}', [CartController::class, 'store'])->middleware('auth');
Route::get('/cart/show', [CartController::class, 'show'])->middleware('auth');
Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->middleware('auth'); // cek session
Route::post('/cart/checkout', [CartController::class, 'checkout'])->middleware('auth');
Route::get('/cart/checkout/{product_id}/', [CartController::class, 'checkoutOne'])->middleware('auth');

Route::get('/wishlist/store/{id}', [WishlistController::class, 'store'])->middleware('auth');
Route::get('/wishlist/show', [WishlistController::class, 'show'])->middleware('auth');
Route::get('/wishlist/destroy/{id}', [WishlistController::class, 'destroy'])->middleware('auth'); // cek session