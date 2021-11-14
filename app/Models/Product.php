<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public static function complete() {
        $products = DB::table('products')->get();
        return $products;
    }

    public static function supplier(String $supplier) {
        $products = DB::table('products')->where('supplier', $supplier)->get();
        return $products;
    }

    public static function id(int $id) {
        $product = DB::table('products')->where('id', $id)->first();
        return $product;
    }
}