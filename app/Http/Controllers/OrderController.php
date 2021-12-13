<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'orders.*.order_details.*.note' => 'max:255'
        ]);
        
        $orders = $request->all()["orders"];
        foreach ($orders as $order) {
            $order_details = array_pop($order);
            $order_id = DB::table('orders')->insertGetId($order);

            foreach ($order_details as $order_detail) {
                $order_detail["order_id"] = $order_id;
                DB::table('order_details')->insert($order_detail);
            }
            DB::table('carts')->where('username', auth()->user()->username)->delete();
        }
        return redirect('/order/show');
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

    public function show(String $status) {

        // mengambil data sesuai status yang diminta
        if ($status == 'all') {
            $orders = Order::getOrdersByUsername(auth()->user()->username);
            $orderDetails = OrderDetail::getOrderDetailsByUsername(auth()->user()->username);
        }
        else {
            $orders = Order::getOrdersByUsernameAndStatus(auth()->user()->username, $status);
            $orderDetails = OrderDetail::getOrderDetailsByUsernameAndStatus(auth()->user()->username, $status);
        }

        // mengembalikan view
        return view('order/show', [
            'showing' => $status,
            'orders' => $orders,
            'order_details' => $orderDetails,
            'title' => 'Order | Show'
        ]);
    }
}