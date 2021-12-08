<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function showPending() {
        return view('customerOrder/show', [
            'showing' => 'need action',
            'order_details' => OrderDetail::getPendingOrdersBySupplier(auth()->user()->username),
            'orders' => Order::getPendingOrdersBySupplier(auth()->user()->username),
            'title' => 'Cutomer Order | Show'
        ]);
    }
    
    public function showInProgress() {
        return view('customerOrder/show', [
            'showing' => 'in progress',
            'order_details' => OrderDetail::getInProgressOrdersBySupplier(auth()->user()->username),
            'orders' => Order::getInProgressOrdersBySupplier(auth()->user()->username),
            'title' => 'Order | Show'
        ]);
    }

    public function showSucceed() {
        return view('customerOrder/show', [
            'showing' => 'succeed',
            'order_details' => OrderDetail::getSucceedOrdersBySupplier(auth()->user()->username),
            'orders' => Order::getSucceedOrdersBySupplier(auth()->user()->username),
            'title' => 'Order | Show'
        ]);
    }

    public function showFailed() {
        return view('customerOrder/show', [
            'showing' => 'failed',
            'order_details' => OrderDetail::getFailedOrdersBySupplier(auth()->user()->username),
            'orders' => Order::getFailedOrdersBySupplier(auth()->user()->username),
            'title' => 'Order | Show'
        ]);
    }
}
