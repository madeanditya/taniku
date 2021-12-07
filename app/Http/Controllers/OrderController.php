<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request) {
        $orders = $request->all()["orders"];
        var_dump($orders);

        foreach ($orders as $order) {

            $order_details = array_pop($order);
            $order_id = DB::table('orders')->insertGetId($order);

            foreach ($order_details as $product_id) {
                $order_detail = [
                    'order_id' => $order_id,
                    'product_id' => $product_id
                ];
                DB::table('order_details')->insert($order_detail);
            }
            
            // removing record inside cart
        }

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