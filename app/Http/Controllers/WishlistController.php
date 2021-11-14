<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function store(int $id) {
        $wishlist = [
            'username' => auth()->user()->username,
            'product_id' => $id
        ];
        
        $flag = DB::table('wishlists')
            ->where('username', $wishlist['username'])
            ->where('product_id', $wishlist['product_id'])
            ->count();

        if (!$flag) {
            DB::table('wishlists')->insert($wishlist);
        }
        
        return back();
    }

    public function show() {
        $products = DB::table('wishlists as w')
            ->select('p.id', 'p.name', 'p.description', 'p.price', 'p.supplier', 'w.id as wishlist_id')
            ->join('products as p', 'w.product_id', '=', 'p.id')
            ->join('users as u', 'w.username', '=', 'u.username')
            ->where('w.username', '=', auth()->user()->username)
            ->get();

        $user = DB::table('users')->where('username', auth()->user()->username)->first();

        return view('wishlist/show', [
            'products' => $products,
            'user' => $user
        ]);
    }

    public function destroy(int $id) {
        DB::table('wishlists')->where('id', $id)->delete();
        return back();
    }
}