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

    public static function username($username) {
        $products = DB::table('wishlists as w')
            ->select('p.id', 'p.name', 'p.description', 'p.price', 'p.supplier', 'w.id as wishlist_id')
            ->join('products as p', 'w.product_id', '=', 'p.id')
            ->join('users as u', 'w.username', '=', 'w.username')
            ->where('w.username', '=', $username)
            ->get();

        return $products;
    }
}
