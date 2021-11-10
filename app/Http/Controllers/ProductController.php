<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Rules\In;
use PhpParser\Node\Expr\Cast\Int_;

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

    public function destroy(int $id) {
        Product::destroy($id);
        return redirect('/product/read');
    }
}
