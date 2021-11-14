<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
            'suppliers' => Cart::getSuppliersByUsername(auth()->user()->username),
            'products' => Cart::getProductsByUsername(auth()->user()->username),
            'user' => User::getUserByUsername(auth()->user()->username)
        ]);
    }

    public function destroy(int $id) {
        DB::table('carts')->where('id', $id)->delete();
        return back();
    }
}
