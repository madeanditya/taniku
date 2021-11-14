<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function store(int $id) {
        $cart = [
            'username' => auth()->user()->username,
            'product_id' => $id
        ];
        
        $flag = DB::table('carts')
            ->where('username', $cart['username'])
            ->where('product_id', $cart['product_id'])
            ->count();

        if (!$flag) {
            DB::table('carts')->insert($cart);
        }
        
        return back();
    }

    public function show() {
        $products = DB::table('carts as c')
            ->select('p.id', 'p.name', 'p.description', 'p.price', 'p.supplier', 'c.id as cart_id')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            ->join('users as u', 'c.username', '=', 'c.username')
            ->where('c.username', '=', auth()->user()->username)
            ->get();

        $user = DB::table('users')->where('username', auth()->user()->username)->first();

        return view('cart/show', [
            'products' => $products,
            'user' => $user
        ]);
    }

    public function destroy(int $id) {
        DB::table('carts')->where('id', $id)->delete();
        return back();
    }
}
