<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function main() {
        return view('home/main', [
            'products' => Product::getProducts(),
            'title' => 'Home | Main'
        ]);
    }

    public function taniku() {
        return view('home/taniku', [
            'title' => 'Home | Taniku'
        ]);
    }

    public function user(String $username) {
        return view('home/user', [
            'products' => Product::getProductsBySupplier($username),
            'user' => User::getUserByUsername($username),
            'title' => 'Home | ' . auth()->user()->username
        ]);
    }
}