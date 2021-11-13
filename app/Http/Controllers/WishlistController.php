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
            'id_product' => $id
        ];

        DB::table('wishlists')
            ->insert($wishlist)
            ->whereNotExist(function($query) {
                $query->where('username', auth()->user()->username)
                    ->where('id_product', $id)
                    ->get();
            });
        
        return redirect('/');
    }

    public function show() {
        $products = DB::table('wishlists as w')
            ->select('p.nama', 'p.deskripsi', 'p.harga', 'p.supplier')
            ->join('products as p', 'w.id_product', '=', 'p.id')
            ->join('users as u', 'w.username', '=', 'u.username')
            ->where('w.username', '=', auth()->user()->username)
            ->get();

        $user = DB::table('users')->where('username', auth()->user()->username)->first();

        return view('wishlist/show', [
            'products' => $products,
            'user' => $user
        ]);   
    }
}