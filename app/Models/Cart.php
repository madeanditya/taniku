<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    public static function flag($username, $product_id) {
        $flag = DB::table('carts')
            ->where('username', $username)
            ->where('product_id', $product_id)
            ->count();
        
        
    }
}
