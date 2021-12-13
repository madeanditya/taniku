<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function show(String $status) {

        // mengambil data sesuai status yang diminta
        if ($status == 'all') {
            $orders = Order::getOrdersBySupplier(auth()->user()->username);
            $orderDetails = OrderDetail::getOrderDetailsBySupplier(auth()->user()->username);
        }
        else {
            $orders = Order::getOrdersBySupplierAndStatus(auth()->user()->username, $status);
            $orderDetails = OrderDetail::getOrderDetailsBySupplierAndStatus(auth()->user()->username, $status);
        }
    
        // mengembalikan view
        return view('customerOrder/show', [
            'showing' => $status,
            'orders' => $orders,
            'order_details' => $orderDetails,
            'title' => 'Cutomer Order | Show'
        ]);
    }
}
