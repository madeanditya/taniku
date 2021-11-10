<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function main() {
        $products = DB::table('products')->get();

        return view('home/main', [
            'products' => $products
        ]);
    }

    public function catalog(String $username) {
        $products = DB::table('products')->where('supplier', $username)->get();
        $user = DB::table('users')->where('username', $username)->first();

        return view('home/catalog', [
            'products' => $products,
            'user' => $user
        ]);
    }
}