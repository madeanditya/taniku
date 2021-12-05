<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class ProductController extends Controller
{
    public function create() {
        return view('product/create', [
            'title' => 'Product | Create'
        ]);
    }

    public function store(Request $request) {
        $product = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category' => 'required|min:3|max:255',
            'weight' => 'required|numeric',
            'supplier' => 'required'
        ]);

        DB::table('products')->insert($product);
        return redirect('/product/show');
    }

    public function show() {
        return view('product/show', [
            'products' => Product::getProductsBySupplier(auth()->user()->username),
            'title' => 'Product | Show'
        ]);
    }

    public function edit(int $id) {

        $product = Product::getProductById($id);

        if ($product->supplier != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        return view('product/edit', [
            'product' => $product,
            'title' => 'Product | Edit'
        ]);
    }

    public function update(Request $request, int $id) {
        $product = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category' => 'required|min:3|max:255',
            'weight' => 'required|numeric',
            'supplier' => 'required'
        ]);

        DB::table('products')->where('id', $id)->update($product);
        return redirect('/product/show');
    }

    public function destroy(int $id) {
        $product = Product::getProductById($id);

        if ($product->supplier != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        DB::table('products')->where('id', $id)->delete();
        return redirect('/product/show');
    }
}