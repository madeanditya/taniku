<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create_one(int $id) {
        return view('order/create', [
            'product' => Product::id($id),
        ]);
    }

    public function create() {
        
    }

    public function store(Request $request) {

    }
}
