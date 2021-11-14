<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class ProductController extends Controller
{
    public function create() {
        return view('product/create');
    }

    public function store(Request $request) {
        $product = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'price' => 'required|numeric',
            'supplier' => 'required'
        ]);

        DB::table('products')->insert($product);
        return redirect('/product/show');
    }

    public function show() {
        return view('product/show', [
            'products' => Product::supplier(auth()->user()->username)
        ]);
    }

    public function edit(int $id) {
        return view('product/edit', [
            'product' => Product::id($id)
        ]);
    }

    public function update(Request $request, int $id) {
        $product = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'price' => 'required|numeric',
            'supplier' => 'required'
        ]);

        DB::table('products')->where('id', $id)->update($product);
        return redirect('/product/show');
    }

    public function destroy(int $id) {
        DB::table('products')->where('id', $id)->delete();
        return redirect('/product/show');
    }
}