<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wishlist extends Model
{
    use HasFactory;

    public static function exist($username, $product_id) {
        $flag = DB::table('wishlists')
            ->where('username', $username)
            ->where('product_id', $product_id)
            ->count();

        return $flag;
    }

    public static function getWishlistById(int $id) {
        $wishlist = DB::table('wishlists')->where('id', $id)->first();
        return $wishlist;
    }

    public static function getProductsByUsername($username) {
        $products = DB::table('wishlists as w')
            ->select('p.id', 'p.name', 'p.description', 'p.price', 'p.supplier', 'w.id as wishlist_id')
            ->join('products as p', 'w.product_id', '=', 'p.id')
            ->where('w.username', '=', $username)
            ->get();

        return $products;
    }

    public static function getSuppliersByUsername($username) {
        $suppliers = DB::table('wishlists as w')
            ->select('p.supplier as username')
            ->join('products as p', 'w.product_id', '=', 'p.id')
            ->where('w.username', '=', $username)
            ->distinct()
            ->get();

        return $suppliers;
    }
}
