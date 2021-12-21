<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerOrderController extends Controller
{
    public function show(String $status) {

        // mengambil data sesuai status yang diminta
        if ($status == 'need_action') {
            $orders = Order::getOrdersBySupplierAndStatus(auth()->user()->username, ['delivering', 'packing', ['delivering', 'packing'], 'waiting_feedback']);
            $orderDetails = OrderDetail::getOrderDetailsBySupplierAndStatus(auth()->user()->username, ['delivering', 'packing', ['delivering', 'packing'], 'waiting_feedback']);
        }
        else if ($status == 'all') {
            $orders = Order::getOrdersBySupplierAndStatus(auth()->user()->username, ['failed', 'succeed', 'arrived', 'delivering', 'packing', 'waiting_payment', 'waiting_feedback']);
            $orderDetails = OrderDetail::getOrderDetailsBySupplierAndStatus(auth()->user()->username, ['failed', 'succeed', 'arrived', 'delivering', 'packing', 'waiting_payment', 'waiting_feedback']);
        }
        else if ($status == 'waiting') {
            $orders = Order::getOrdersBySupplierAndStatus(auth()->user()->username, ['waiting_payment', 'waiting_feedback']);
            $orderDetails = OrderDetail::getOrderDetailsBySupplierAndStatus(auth()->user()->username, ['waiting_payment', 'waiting_feedback']);
        }
        else if ($status == 'in_progress') {
            $orders = Order::getOrdersBySupplierAndStatus(auth()->user()->username, ['arrived', 'delivering', 'packing']);
            $orderDetails = OrderDetail::getOrderDetailsBySupplierAndStatus(auth()->user()->username, ['arrived', 'delivering', 'packing']);
        }
        else if ($status == 'finished') {
            $orders = Order::getOrdersBySupplierAndStatus(auth()->user()->username, ['failed', 'succeed']);
            $orderDetails = OrderDetail::getOrderDetailsBySupplierAndStatus(auth()->user()->username, ['failed', 'succeed']);
        }
    
        // mengembalikan view
        return view('customerOrder/show', [
            'showing' => $status,
            'orders' => $orders,
            'order_details' => $orderDetails,
            'title' => 'Cutomer Order | Show'
        ]);
    }

    public function accept(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->supplier != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = waiting_feedback
        if ($order->status != 'waiting_feedback') {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['status' => 'packing']);
        return back();
    }

    public function reject(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->supplier != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = waiting_feedback
        if ($order->status != 'waiting_feedback') {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['status' => 'failed']);
        return back();
    }

    public function deliver(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->supplier != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = packing
        if ($order->status != 'packing') {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['status' => 'delivering']);
        return back();
    }

    public function arrive(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->supplier != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = delivering
        if ($order->status != 'delivering') {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['status' => 'arrived']);
        return back();
    }

    public function apply_cancel_request(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->supplier != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = packing atau delivering
        // validasi in_cancel_request = 0
        if ( !(($order->status == 'packing' or $order->status == 'delivering') and $order->in_cancel_request == 0) ) {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['in_cancel_request' => 2]);
        return back();
    }

    public function cancel_cancel_request(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->supplier != auth()->user()->username) {
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

    public function accept_cancel_request(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->supplier != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // validasi status order = packing atau delivering
        // validasi in_cancel_request = 1
        if ( !(($order->status == 'packing' or $order->status == 'delivering') and $order->in_cancel_request == 1) ) {
            return back();
        }

        // ubah status order
        DB::table('orders')->where('id', $id)->update(['status' => 'failed']);
        return back();
    }

    public function reject_cancel_request(int $id) {

        // authorization
        $order = Order::getOrderById($id);
        if ($order->supplier != auth()->user()->username) {
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
}
