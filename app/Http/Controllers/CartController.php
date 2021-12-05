<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function store(int $id) {
        $cart = [
            'username' => auth()->user()->username,
            'product_id' => $id
        ];

        if (!Cart::exist(auth()->user()->username, $id)) {
            DB::table('carts')->insert($cart);
        }
        
        return back();
    }

    public function show() {
        return view('cart/show', [
            'user' => User::getUserByUsername(auth()->user()->username),
            'suppliers' => Cart::getSuppliersByUsername(auth()->user()->username),
            'products' => Cart::getProductsByUsername(auth()->user()->username),
            'title' => 'Cart | Show'
        ]);
    }

    public function destroy(int $id) {
        $cart = Cart::getCartById($id);

        if ($cart->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        DB::table('carts')->where('id', $id)->delete();
        return back();
    }

    public function checkoutOne(int $id) {
        return view('cart/checkout', [
            'user' => User::getUserByUsername(auth()->user()->username),
            'product' => Product::getProductById($id),
            'addresses' => Address::getAddressesByUsername(auth()->user()->username),
            'title' => 'Cart | Checkout'
        ]);
    }
    
    public function checkout() {
        return view('cart/checkout', [
            'user' => User::getUserByUsername(auth()->user()->username),
            'products' => Cart::getProductsByUsername(auth()->user()->username),
            'addresses' => Address::getAddressesByUsername(auth()->user()->username),
            'suppliers' => Cart::getSuppliersByUsername(auth()->user()->username),
            'title' => 'Cart | Checkout'
        ]);
    }
}
