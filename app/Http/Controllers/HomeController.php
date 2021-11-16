<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}