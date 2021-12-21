<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDetail extends Model
{
    use HasFactory;

    public static function getOrderDetailsByUsernameAndStatus(String $username, Array $array_of_status) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->select('od.*', 'p.name', 'p.price', 'p.stock', 'p.category', 'p.weight', 'o.supplier', 'o.status')
            ->where('o.username', $username)
            ->where('o.status', null);

        foreach ($array_of_status as $status) {
            // in cancel request
            if (gettype($status) == 'array') {
                foreach ($status as $stat) {
                    $order_details = DB::table('order_details as od')
                    ->join('products as p', 'od.product_id', '=', 'p.id')
                    ->join('orders as o', 'od.order_id', '=', 'o.id')
                    ->select('od.*', 'p.name', 'p.price', 'p.stock', 'p.category', 'p.weight', 'o.supplier', 'o.status')
                    ->where('o.username', $username)
                    ->where('o.status', $stat)
                    ->where('o.in_cancel_request', 2)
                    ->union($order_details); 
                }
            }
            // not in cancel request
            else {
                $order_details = DB::table('order_details as od')
                    ->join('products as p', 'od.product_id', '=', 'p.id')
                    ->join('orders as o', 'od.order_id', '=', 'o.id')
                    ->select('od.*', 'p.name', 'p.price', 'p.stock', 'p.category', 'p.weight', 'o.supplier', 'o.status')
                    ->where('o.username', $username)
                    ->where('o.status', $status)
                    ->union($order_details); 
            }
        }

        $order_details = $order_details->get();
        return $order_details;
    }

    public static function getOrderDetailsBySupplierAndStatus(String $supplier, Array $array_of_status) {
        $order_details = DB::table('order_details as od')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->join('orders as o', 'od.order_id', '=', 'o.id')
            ->select('od.*', 'p.name', 'p.price', 'p.stock', 'p.category', 'p.weight', 'o.supplier', 'o.status')
            ->where('o.supplier', $supplier)
            ->where('o.status', null);

        foreach ($array_of_status as $status) {
            // in cancel request
            if (gettype($status) == 'array') {
                foreach ($status as $stat) {
                    $order_details = DB::table('order_details as od')
                    ->join('products as p', 'od.product_id', '=', 'p.id')
                    ->join('orders as o', 'od.order_id', '=', 'o.id')
                    ->select('od.*', 'p.name', 'p.price', 'p.stock', 'p.category', 'p.weight', 'o.supplier', 'o.status')
                    ->where('o.supplier', $supplier)
                    ->where('o.status', $stat)
                    ->where('o.in_cancel_request', 1)
                    ->union($order_details); 
                }
            }
            // not in cancel request
            else {
                $order_details = DB::table('order_details as od')
                    ->join('products as p', 'od.product_id', '=', 'p.id')
                    ->join('orders as o', 'od.order_id', '=', 'o.id')
                    ->select('od.*', 'p.name', 'p.price', 'p.stock', 'p.category', 'p.weight', 'o.supplier', 'o.status')
                    ->where('o.supplier', $supplier)
                    ->where('o.status', $status)
                    ->union($order_details); 
            }
        }
        
        $order_details = $order_details->get();
        return $order_details;
    }
}