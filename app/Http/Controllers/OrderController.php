<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request) {
        $orders = $request->all()["orders"];

        foreach ($orders as $order) {
            $product_ids = array_pop($order);
            $order_id = DB::table('orders')->insertGetId($order);

            foreach ($product_ids as $product_id) {
                $order_detail = [
                    'order_id' => $order_id,
                    'product_id' => $product_id
                ];
                DB::table('order_details')->insert($order_detail);
            }   
            DB::table('carts')->where('username', auth()->user()->username)->delete();
        }
        return back();
    }

    public function storeOne(Request $request) {
        $order = $request->except('_token', 'submit');
        $product_id = array_pop($order);
        $order_id = DB::table('orders')->insertGetId($order);
        $order_detail = [
            'order_id' => $order_id,
            'product_id' => $product_id
        ];
        DB::table('order_details')->insert($order_detail);
        return back();
    }

    public function show() {
        return view('order/show', [
            'showing' => 'all',
            'title' => 'Order | Show'
        ]);
    }
    
    public function showInProgress() {
        return view('order/show', [
            'showing' => 'in progress',
            'title' => 'Order | Show'
        ]);
    }

    public function showSucceed() {
        return view('order/show', [
            'showing' => 'succeed',
            'title' => 'Order | Show'
        ]);
    }

    public function showFailed() {
        return view('order/show', [
            'showing' => 'failed',
            'title' => 'Order | Show'
        ]);
    }
}