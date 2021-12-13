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
            'suppliers' => Cart::getSuppliersOnCartByUsername(auth()->user()->username),
            'products' => Cart::getProductsOnCartByUsername(auth()->user()->username),
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

    public function checkout(Request $request) {
        $suppliers = $request->input('suppliers');
        return view('cart/checkout', [
            'suppliers' => $suppliers,
            'addresses' => Address::getAddressesByUsername(auth()->user()->username),
            'active_address' => Address::getDefaultAddress(auth()->user()->username)->id,
            'title' => 'Cart | Checkout'
        ]);
    }

    public function customCheckout(Request $request) {
        $data = $request->all();

        if ($data['submit'] == 'select and update') {
            $address = Address::getAddressById($data['active_address']);
            if ($address->username != auth()->user()->username) {
                abort(403, 'Unauthorized action.');
            }
    
            DB::table('addresses')->where('username', auth()->user()->username)->where('default', 1)->update(['default' => 0]);
            DB::table('addresses')->where('id', $data['active_address'])->update(['default' => 1]);
        }

        return view('cart/checkout', [
            'user' => User::getUserByUsername(auth()->user()->username),
            'suppliers' => Cart::getSuppliersOnCartByUsername(auth()->user()->username),
            'products' => Cart::getProductsOnCartByUsername(auth()->user()->username),
            'addresses' => Address::getAddressesByUsername(auth()->user()->username),
            'active_address' => $data['active_address'],
            'title' => 'Cart | Checkout'
        ]);
    }

    public function checkoutOne(int $product_id) {
        return view('cart/checkoutOne', [
            'user' => User::getUserByUsername(auth()->user()->username),
            'product' => Product::getProductById($product_id),
            'addresses' => Address::getAddressesByUsername(auth()->user()->username),
            'active_address' => Address::getDefaultAddress(auth()->user()->username)->id,
            'title' => 'Cart | Checkout One'
        ]);
    }

    public function customCheckoutOne(Request $request, int $product_id) {
        $data = $request->all();

        if ($data['submit'] == 'select and update') {
            $address = Address::getAddressById($data['active_address']);
            if ($address->username != auth()->user()->username) {
                abort(403, 'Unauthorized action.');
            }
    
            DB::table('addresses')->where('username', auth()->user()->username)->where('default', 1)->update(['default' => 0]);
            DB::table('addresses')->where('id', $data['active_address'])->update(['default' => 1]);
        }

        return view('cart/checkoutOne', [
            'user' => User::getUserByUsername(auth()->user()->username),
            'product' => Product::getProductById($product_id),
            'addresses' => Address::getAddressesByUsername(auth()->user()->username),
            'active_address' => $data['active_address'],
            'title' => 'Cart | Checkout'
        ]);
    }
}
