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
        return redirect('/order/show/need_action');
    }

    public function show(String $status) {

        // mengambil data sesuai status yang diminta
        if ($status == 'need_action') {
            $orders = Order::getOrdersByUsernameAndStatus(auth()->user()->username, ['arrived', ['packing', 'delivering'], 'waiting_payment']);
            $orderDetails = OrderDetail::getOrderDetailsByUsernameAndStatus(auth()->user()->username, ['arrived', ['packing', 'delivering'], 'waiting_payment']);
        }
        else if ($status == 'all') {
            $orders = Order::getOrdersByUsernameAndStatus(auth()->user()->username, ['failed', 'succeed', 'packing', 'delivering', 'arrived', 'waiting_feedback', 'waiting_payment']);
            $orderDetails = OrderDetail::getOrderDetailsByUsernameAndStatus(auth()->user()->username, ['failed', 'succeed', 'packing', 'delivering', 'arrived', 'waiting_feedback', 'waiting_payment']);
        }
        else if ($status == 'waiting') {
            $orders = Order::getOrdersByUsernameAndStatus(auth()->user()->username, ['waiting_feedback', 'waiting_payment']);
            $orderDetails = OrderDetail::getOrderDetailsByUsernameAndStatus(auth()->user()->username, ['waiting_feedback', 'waiting_payment']);
        }
        else if ($status == 'in_progress') {
            $orders = Order::getOrdersByUsernameAndStatus(auth()->user()->username, ['packing', 'delivering', 'arrived']);
            $orderDetails = OrderDetail::getOrderDetailsByUsernameAndStatus(auth()->user()->username, ['packing', 'delivering', 'arrived']);
        }
        else if ($status == 'finished') {
            $orders = Order::getOrdersByUsernameAndStatus(auth()->user()->username, ['failed', 'succeed']);
            $orderDetails = OrderDetail::getOrderDetailsByUsernameAndStatus(auth()->user()->username, ['failed', 'succeed']);
        }

        // mengembalikan view
        return view('order/show', [
            'showing' => $status,
            'orders' => $orders,
            'order_details' => $orderDetails,
            'title' => 'Order | Show'
        ]);
    }

    public function pay(int $id) {
        
        // authorization
        $order = Order::getOrderById($id);
        if ($order->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = waiting_payment
        if ($order->status != 'waiting_payment') {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['status' => 'waiting_feedback']);
        return back();
    }

    public function cancel(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = waiting_payment atau waiting_feedback
        if ( !($order->status == 'waiting_payment' or $order->status == 'waiting_feedback') ) {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['status' => 'failed']);
        return back();
    }

    public function confirm(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = arrived
        if ($order->status != 'arrived') {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['status' => 'succeed']);
        return back();
    }

    public function complaint(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = arrived
        if ($order->status != 'arrived') {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['status' => 'succeed']);
        return back();
    }

    public function apply_cancel_request(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = packing atau delivering
        // validasi in_cancel_request = 0
        if ( !(($order->status == 'packing' or $order->status == 'delivering') and $order->in_cancel_request == 0) ) {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['in_cancel_request' => 1]);
        return back();
    }

    public function cancel_cancel_request(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = packing atau delivering
        // validasi in_cancel_request = 1
        if ( !(($order->status == 'packing' or $order->status == 'delivering') and $order->in_cancel_request == 1) ) {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['in_cancel_request' => 0]);
        return back();
    }

    public function accept_cancel_request(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = packing atau delivering
        // validasi in_cancel_request = 2
        if ( !(($order->status == 'packing' or $order->status == 'delivering') and $order->in_cancel_request == 2) ) {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['status' => 'failed']);
        return back();
    }

    public function reject_cancel_request(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = packing atau delivering
        // validasi in_cancel_request = 2
        if ( !(($order->status == 'packing' or $order->status == 'delivering') and $order->in_cancel_request == 2) ) {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['in_cancel_request' => 0]);
        return back();
    }
}