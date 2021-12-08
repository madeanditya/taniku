<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnValueMap;

class Order extends Model
{
    use HasFactory;

    public static function getPendingOrdersBySupplier(String $supplier) {
        $orders = DB::table('orders as o')
            ->join('addresses as a', 'o.address_id', 'a.id')
            ->where('supplier', $supplier)
            ->where('status', 'pending')
            ->get();

        return $orders;
    }

    public static function getInProgressOrdersBySupplier(String $supplier) {
        $orders = DB::table('orders as o')
            ->join('addresses as a', 'o.address_id', 'a.id')
            ->where('supplier', $supplier)
            ->where('status', 'in progress')
            ->get();

        return $orders;
    }

    public static function getSucceedOrdersBySupplier(String $supplier) {
        $orders = DB::table('orders as o')
            ->join('addresses as a', 'o.address_id', 'a.id')
            ->where('supplier', $supplier)
            ->where('status', 'succeed')
            ->get();

        return $orders;
    }

    public static function getFailedOrdersBySupplier(String $supplier) {
        $orders = DB::table('orders as o')
            ->join('addresses as a', 'o.address_id', 'a.id')
            ->where('supplier', $supplier)
            ->where('status', 'failed')
            ->get();

        return $orders;
    }
}
