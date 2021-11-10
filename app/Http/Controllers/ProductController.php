<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class ProductController extends Controller
{
    public function create(String $username) {
        return view('product/create', [
            'username' => $username
        ]);
    }

    public function store(Request $request) {
        $product = $request->validate([
            'nama' => 'required|min:3|max:255',
            'deskripsi' => 'required|min:3|max:255',
            'harga' => 'required|numeric',
            'supplier' => 'required'
        ]);

        DB::table('products')->insert($product);
        return redirect('/' . auth()->user()->username . '/product/create');
    }

    public function show(String $username) {
        $products = DB::table('products')->where('supplier', $username)->get();

        return view('product/show', [
            'products' => $products
        ]);
    }

    public function edit(String $username, int $id) {
        $product = DB::table('products')->where('id', $id)->first();

        return view('product/edit', [
            'product' => $product,
            'username' => $username
        ]);
    }

    public function update(Request $request, int $id) {
        $product = $request->validate([
            'nama' => 'required|min:3|max:255',
            'deskripsi' => 'required|min:3|max:255',
            'harga' => 'required|numeric',
            'supplier' => 'required'
        ]);

        DB::table('products')->where('id', $id)->update($product);
        return redirect('/' . auth()->user()->username . '/product/show');
    }

    public function destroy(int $id) {
        DB::table('products')->where('id', $id)->delete();
        return redirect('/' . auth()->user()->username . '/product/show');
    }
}
