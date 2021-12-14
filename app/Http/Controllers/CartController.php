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

        // cart record
        $cart = [
            'username' => auth()->user()->username,
            'product_id' => $id
        ];

        // memeriksa apakah ada record cart yang serupa, jika belum tambahkan record tersebut
        if (!Cart::exist(auth()->user()->username, $id)) {
            DB::table('carts')->insert($cart);
        }

        return back();
    }

    public function show() {
        return view('cart/show', [
            'user' => User::getUserByUsername(auth()->user()->username),
            'suppliers' => Cart::getSuppliersOnCartByUsername(auth()->user()->username),
            'products' => Cart::getProductsOnCartByUsername(auth()->user()->username),
            'title' => 'Cart | Show'
        ]);
    }

    public function destroy(int $id) {

        // authorization
        $cart = Cart::getCartById($id);
        if ($cart->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // deleting cart data
        DB::table('carts')->where('id', $id)->delete();
        return back();
    }

    public function checkout(Request $request) {

        // validasi input note
        $request->validate([
            'suppliers.*.products.*.note' => 'max:5'
        ]);

        // retrieving form request data
        $suppliers = $request->input('suppliers');

        return view('cart/checkout', [
            'suppliers' => $suppliers,
            'addresses' => Address::getAddressesByUsername(auth()->user()->username),
            'active_address' => Address::getDefaultAddress(auth()->user()->username)->id,
            'title' => 'Cart | Checkout'
        ]);
    }

    public function checkoutOne(int $product_id) {
        return view('cart/checkoutOne', [
            'product' => Product::getProductById($product_id),
            'addresses' => Address::getAddressesByUsername(auth()->user()->username),
            'active_address' => Address::getDefaultAddress(auth()->user()->username)->id,
            'title' => 'Cart | Checkout One'
        ]);
    }
}