<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function show() {
        return view('customerOrder/show', [
            'title' => 'Cutomer Order | Show'
        ]);
    }
}
