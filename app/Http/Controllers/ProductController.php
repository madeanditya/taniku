<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create() {
        return view('product/create');
    }

    public function store(Request $request) {
        $product = $request->validate([
            'nama' => 'required|min:3|max:255',
            'deskripsi' => 'required|min:3|max:255',
            'harga' => 'required|numeric'
        ]);

        DB::table('products')->insert($product);
        return redirect('/product/create');
    }

    public function read() {
        $products = DB::table('products')->get();

        return view('product/read', [
            'products' => $products
        ]);
    }

    public function update(int $id) {
        $product = DB::table('products')->where('id', $id)->first();

        return view('product/update', [
            'product' => $product
        ]);
    }

    public function restore(Request $request, int $id) {
        $product = $request->validate([
            'nama' => 'required|min:3|max:255',
            'deskripsi' => 'required|min:3|max:255',
            'harga' => 'required|numeric'
        ]);

        DB::table('products')->where('id', $id)->update($product);
        return redirect('/product/read');
    }

    public function destroy(int $id) {
        DB::table('products')->where('id', $id)->delete();
        return redirect('/product/read');
    }
}
