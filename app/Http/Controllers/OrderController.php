<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class OrderController extends Controller
{
    public function store(Request $request) {
    
        // yang dikirim lewat post request
        // orders
        // - username
        // - supplier
        // - shipper
        // - address_id
        // - order_details
        //   - quantity
        //   - note
        //   - order_id
        //   - product_id
            
        // mengambil records orders
        $orders = $request->input('orders');

        // inserting order records one by one
        foreach ($orders as $order) {

            // mengambil data order details dari sebuah record order
            $order_details = array_pop($order);

            // memasukan record order dan mengambil id dari record tersebut
            $order_id = DB::table('orders')->insertGetId($order);

            // memasukan record order details dari semua data order
            foreach ($order_details as $order_detail) {
                $order_detail["order_id"] = $order_id;
                DB::table('order_details')->insert($order_detail);
            }

            // menghapus seluruh data shopping cart
            DB::table('carts')->where('username', auth()->user()->username)->delete();
        }
        return redirect('/order/show/all');
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