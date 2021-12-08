<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDetail extends Model
{
    use HasFactory;

    public static function getPendingOrdersBySupplier(String $supplier) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->where('o.supplier', $supplier)
            ->where('o.status', 'pending')
            ->get();

        return $order_details;
    }

    public static function getInProgressOrdersBySupplier(String $supplier) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->where('o.supplier', $supplier)
            ->where('o.status', 'in progress')
            ->get();

        return $order_details;
    }

    public static function getSucceedOrdersBySupplier(String $supplier) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->where('o.supplier', $supplier)
            ->where('o.status', 'succeed')
            ->get();

        return $order_details;
    }

    public static function getFailedOrdersBySupplier(String $supplier) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->where('o.supplier', $supplier)
            ->where('o.status', 'failed')
            ->get();

        return $order_details;
    }

    public static function getOrdersByUsername(String $username) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->where('o.username', $username)
            ->get();

        return $order_details;
    }

    public static function getInProgressOrdersByUsername(String $username) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->where('o.username', $username)
            ->where('o.status', 'in progress')
            ->get();

        return $order_details;
    }

    public static function getSucceedOrdersByUsername(String $username) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->where('o.username', $username)
            ->where('o.status', 'succeed')
            ->get();

        return $order_details;
    }

    public static function getFailedOrdersByUsername(String $username) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->where('o.username', $username)
            ->where('o.status', 'failed')
            ->get();

        return $order_details;
    }
}
