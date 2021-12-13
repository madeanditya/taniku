<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnValueMap;

class Order extends Model
{
    use HasFactory;

    public static function getOrdersBySupplier(String $supplier) {
        $orders = DB::table('orders as o')
            ->join('addresses as a', 'o.address_id', 'a.id')
            ->select('o.id', 'o.username', 'o.supplier', 'o.shipper', 'o.status', 'o.address_id', 'a.fullname', 'a.phone_number', 'a.address', 'a.subdistrict', 'a.city', 'a.province', 'a.postal_code')
            ->where('o.supplier', $supplier)
            ->get();

        return $orders;
    }

    public static function getOrdersBySupplierAndStatus(String $supplier, String $status) {
        $orders = DB::table('orders as o')
            ->join('addresses as a', 'o.address_id', 'a.id')
            ->select('o.id', 'o.username', 'o.supplier', 'o.shipper', 'o.status', 'o.address_id', 'a.fullname', 'a.phone_number', 'a.address', 'a.subdistrict', 'a.city', 'a.province', 'a.postal_code')
            ->where('o.supplier', $supplier)
            ->where('o.status', $status)
            ->get();

        return $orders;
    }

    public static function getOrdersByUsername(String $username) {
        $orders = DB::table('orders as o')
            ->join('addresses as a', 'o.address_id', 'a.id')
            ->select('o.id', 'o.username', 'o.supplier', 'o.shipper', 'o.status', 'o.address_id', 'a.fullname', 'a.phone_number', 'a.address', 'a.subdistrict', 'a.city', 'a.province', 'a.postal_code')
            ->where('o.username', $username)
            ->get();

        return $orders;
    }

    public static function getOrdersByUsernameAndStatus(String $username, String $status) {
        $orders = DB::table('orders as o')
            ->join('addresses as a', 'o.address_id', 'a.id')
            ->select('o.id', 'o.username', 'o.supplier', 'o.shipper', 'o.status', 'o.address_id', 'a.fullname', 'a.phone_number', 'a.address', 'a.subdistrict', 'a.city', 'a.province', 'a.postal_code')
            ->where('o.username', $username)
            ->where('o.status', $status)
            ->get();

        return $orders;
    }
}
