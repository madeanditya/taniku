<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function main(String $username) {

        return view('catalog/main', [
            'products' => Product::supplier($username),
            'user' => User::username($username)
        ]);
    }
}