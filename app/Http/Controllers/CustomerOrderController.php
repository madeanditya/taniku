<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function showPending() {
        return view('customerOrder/show', [
            'showing' => 'Butuh tindakan',
            'orders' => Order::getPendingOrdersBySupplier(auth()->user()->username),
            'title' => 'Cutomer Order | Show'
        ]);
    }
    
    public function showInProgress() {
        return view('customerOrder/show', [
            'showing' => 'Berlangsung',
            'orders' => Order::getInProgressOrdersBySupplier(auth()->user()->username),
            'title' => 'Order | Show'
        ]);
    }

    public function showSucceed() {
        return view('customerOrder/show', [
            'showing' => 'Berhasil',
            'orders' => Order::getSucceedOrdersBySupplier(auth()->user()->username),
            'title' => 'Order | Show'
        ]);
    }

    public function showFailed() {
        return view('customerOrder/show', [
            'showing' => 'Tidak Berhasil',
            'orders' => Order::getFailedOrdersBySupplier(auth()->user()->username),
            'title' => 'Order | Show'
        ]);
    }
}
