<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create() {
        return view('product/create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:255',
            'deskripsi' => 'required|min:3|max:255',
            'harga' => 'required|numeric'
        ]);

        Product::create($validatedData);
        return redirect('/product/create');
    }

    public function read() {
        $products = Product::all();

        return view('product/read', [
            "products" => $products
        ]);
    }
}
