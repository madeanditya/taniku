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

// main routes
Route::get('/', [HomeController::class, 'main']);
Route::get('/taniku', [HomeController::class, 'taniku']);
Route::get('/{username}', [HomeController::class, 'user']);
Route::get('/home/product/{id}', [HomeController::class, 'product']);

// user management
Route::group(['middleware' => 'guest'], function() {
    Route::get('/user/register', [UserController::class, 'register']);
    Route::post('/user/register', [UserController::class, 'store']);
    Route::get('/user/login', [UserController::class, 'login'])->name('login');
    Route::post('/user/login', [UserController::class, 'authenticate']);
});
Route::group(['middleware' => 'auth'], function() {
    Route::post('/user/logout', [UserController::class, 'logout']);
    Route::get('/user/settings', [UserController::class, 'settings']);
});

// address management
Route::group(['middleware' => 'auth'], function() {
    Route::get('/address/create', [AddressController::class, 'create']);
    Route::post('/address/store', [AddressController::class, 'store']);
    Route::get('/address/show', [AddressController::class, 'show']);
    Route::get('/address/edit/{id}', [AddressController::class, 'edit']); // cek session
    Route::post('/address/update/{id}', [AddressController::class, 'update']);
    Route::get('/address/destroy/{id}', [AddressController::class, 'destroy']); // cek session
    Route::get('/address/default/{id}', [AddressController::class, 'default']); // cek session
});

// order management
Route::group(['middleware' => 'auth'], function() {
    Route::post('/order/store', [OrderController::class, 'store']);
    Route::get('/order/show/{status}', [OrderController::class, 'show']);
    Route::get('/order/pay/{id}', [OrderController::class, 'pay']); // cek session
    Route::get('/order/cancel/{id}', [OrderController::class, 'cancel']); // cek session
    Route::get('/order/confirm/{id}', [OrderController::class, 'confirm']); // cek session
    Route::get('/order/complaint/{id}', [OrderController::class, 'complaint']); // cek session
    Route::get('/order/apply_cancel_request/{id}', [OrderController::class, 'apply_cancel_request']); // cek session
    Route::get('/order/cancel_cancel_request/{id}', [OrderController::class, 'cancel_cancel_request']); // cek session
    Route::get('/order/accept_cancel_request/{id}', [OrderController::class, 'accept_cancel_request']); // cek session
    Route::get('/order/reject_cancel_request/{id}', [OrderController::class, 'reject_cancel_request']); // cek session
});

// cart management
Route::group(['middleware' => 'auth'], function() {
    Route::get('/cart/store/{id}', [CartController::class, 'store']);
    Route::get('/cart/show', [CartController::class, 'show']);
    Route::get('/cart/destroy/{id}', [CartController::class, 'destroy']); // cek session
    Route::post('/cart/checkout', [CartController::class, 'checkout']);
    Route::get('/cart/checkout/{product_id}/', [CartController::class, 'checkoutOne']);
});

// wishlist management
Route::group(['middleware' => 'auth'], function() {
    Route::get('/wishlist/store/{id}', [WishlistController::class, 'store']);
    Route::get('/wishlist/show', [WishlistController::class, 'show']);
    Route::get('/wishlist/destroy/{id}', [WishlistController::class, 'destroy']); // cek session
});

// product management
Route::group(['middleware' => ['auth', 'supplier']], function() {
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::get('/product/show', [ProductController::class, 'show']);
    Route::get('/product/edit/{id}', [ProductController::class, 'edit']); // cek session
    Route::post('/product/update/{id}', [ProductController::class, 'update']);
    Route::get('/product/destroy/{id}', [ProductController::class, 'destroy']); // cek session
});

// customer order management
Route::group(['middleware' => ['auth', 'supplier']], function() {
    Route::get('/customer_order/show/{status}', [CustomerOrderController::class, 'show']);
    Route::get('/customer_order/accept/{id}', [CustomerOrderController::class, 'accept']); // cek session
    Route::get('/customer_order/reject/{id}', [CustomerOrderController::class, 'reject']); // cek session
    Route::get('/customer_order/deliver/{id}', [CustomerOrderController::class, 'deliver']); // cek session
    Route::get('/customer_order/arrive/{id}', [CustomerOrderController::class, 'arrive']); // cek session
    Route::get('/customer_order/apply_cancel_request/{id}', [CustomerOrderController::class, 'apply_cancel_request']); // cek session
    Route::get('/customer_order/cancel_cancel_request/{id}', [CustomerOrderController::class, 'cancel_cancel_request']); // cek session
    Route::get('/customer_order/accept_cancel_request/{id}', [CustomerOrderController::class, 'accept_cancel_request']); // cek session
    Route::get('/customer_order/reject_cancel_request/{id}', [CustomerOrderController::class, 'reject_cancel_request']); // cek session
});
