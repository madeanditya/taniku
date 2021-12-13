<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDetail extends Model
{
    use HasFactory;

    public static function getOrderDetailsBySupplier(String $supplier) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->select('od.id', 'od.quantity', 'od.note', 'od.order_id', 'od.product_id', 'p.name', 'p.price', 'p.weight', 'p.supplier', 'o.supplier', 'o.status')
            ->where('o.supplier', $supplier)
            ->get();

        return $order_details;
    }

    public static function getOrderDetailsBySupplierAndStatus(String $supplier, String $status) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->select('od.id', 'od.quantity', 'od.note', 'od.order_id', 'od.product_id', 'p.name', 'p.price', 'p.weight', 'p.supplier', 'o.supplier', 'o.status')
            ->where('o.supplier', $supplier)
            ->where('o.status', $status)
            ->get();

        return $order_details;
    }

    public static function getOrderDetailsByUsername(String $username) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->select('od.id', 'od.quantity', 'od.note', 'od.order_id', 'od.product_id', 'p.name', 'p.price', 'p.weight', 'p.supplier', 'o.supplier', 'o.status')
            ->where('o.username', $username)
            ->get();

        return $order_details;
    }

    public static function getOrderDetailsByUsernameAndStatus(String $username, String $status) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->select('od.id', 'od.quantity', 'od.note', 'od.order_id', 'od.product_id', 'p.name', 'p.price', 'p.weight', 'p.supplier', 'o.supplier', 'o.status')
            ->where('o.username', $username)
            ->where('o.status', $status)
            ->get();

        return $order_details;
    }
}