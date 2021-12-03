<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request) {
        
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