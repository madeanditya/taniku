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

        // wishlist record
        $wishlist = [
            'username' => auth()->user()->username,
            'product_id' => $id
        ];

        // memeriksa ada atau tidaknya record serupa dengan record input pada tabel wishlist
        if (!Wishlist::exist(auth()->user()->username, $id)) {
            DB::table('wishlists')->insert($wishlist);
        }
        
        return back();
    }

    public function show() {
        return view('wishlist/show', [
            'suppliers' => Wishlist::getSuppliersByUsername(auth()->user()->username),
            'products' => Wishlist::getProductsByUsername(auth()->user()->username),
            'user' => User::getUserByUsername(auth()->user()->username),
            'title' => 'Wishlist | Show'
        ]);
    }

    public function destroy(int $id) {

        // authorization
        $wishlist = Wishlist::getWishlistById($id);
        if ($wishlist->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // deleting wishlist record
        DB::table('wishlists')->where('id', $id)->delete();
        return back();
    }
}