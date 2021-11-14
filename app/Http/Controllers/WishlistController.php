<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        if (!Wishlist::exist(auth()->user()->username, $id)) {
            DB::table('wishlists')->insert($wishlist);
        }
        
        return back();
    }

    public function show() {
        return view('wishlist/show', [
            'products' => Wishlist::username(auth()->user()->username),
            'user' => User::username(auth()->user()->username)
        ]);
    }

    public function destroy(int $id) {
        DB::table('wishlists')->where('id', $id)->delete();
        return back();
    }
}