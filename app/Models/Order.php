<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\UnionType;

use function PHPSTORM_META\type;
use function PHPUnit\Framework\returnValueMap;

class Order extends Model
{
    use HasFactory;

    public static function getOrderById($id) {
        $order = DB::table('orders')
            ->where('id', $id)
            ->first();
        
        return $order;
    }

    public static function getOrdersByUsernameAndStatus(String $username, Array $array_of_status) {
        $orders = DB::table('orders as o')
            ->join('addresses as a', 'o.address_id', 'a.id')
            ->select('o.*', 'a.fullname', 'a.phone_number', 'a.province', 'a.city', 'a.subdistrict', 'a.address', 'a.postal_code')
            ->where('o.username', $username)
            ->where('o.status', null);

        foreach ($array_of_status as $status) {
            // in cancel request
            if (gettype($status) == 'array') {
                foreach ($status as $stat) {
                    $orders = DB::table('orders as o')
                        ->join('addresses as a', 'o.address_id', 'a.id')
                        ->select('o.*', 'a.fullname', 'a.phone_number', 'a.province', 'a.city', 'a.subdistrict', 'a.address', 'a.postal_code')
                        ->where('o.username', $username)
                        ->where('o.status', $stat)
                        ->where('o.in_cancel_request', 2)
                        ->union($orders);
                }
            }
            // not in cancel request
            else {
                $orders = DB::table('orders as o')
                    ->join('addresses as a', 'o.address_id', 'a.id')
                    ->select('o.*', 'a.fullname', 'a.phone_number', 'a.province', 'a.city', 'a.subdistrict', 'a.address', 'a.postal_code')
                    ->where('o.username', $username)
                    ->where('o.status', $status)
                    ->union($orders);
            }
        }

        $orders = $orders->get();
        return $orders;
    }

    public static function getOrdersBySupplierAndStatus(String $supplier, Array $array_of_status) {
        $orders = DB::table('orders as o')
            ->join('addresses as a', 'o.address_id', 'a.id')
            ->select('o.*', 'a.fullname', 'a.phone_number', 'a.province', 'a.city', 'a.subdistrict', 'a.address', 'a.postal_code')
            ->where('o.supplier', $supplier)
            ->where('o.status', null);

        foreach ($array_of_status as $status) {
            // in cancel request
            if (gettype($status) == 'array') {
                foreach ($status as $stat) {
                    $orders = DB::table('orders as o')
                        ->join('addresses as a', 'o.address_id', 'a.id')
                        ->select('o.*', 'a.fullname', 'a.phone_number', 'a.province', 'a.city', 'a.subdistrict', 'a.address', 'a.postal_code')
                        ->where('o.supplier', $supplier)
                        ->where('o.status', $stat)
                        ->where('o.in_cancel_request', 1)
                        ->union($orders);
                }
            }
            // not in cancel request
            else {
                $orders = DB::table('orders as o')
                    ->join('addresses as a', 'o.address_id', 'a.id')
                    ->select('o.*', 'a.fullname', 'a.phone_number', 'a.province', 'a.city', 'a.subdistrict', 'a.address', 'a.postal_code')
                    ->where('o.supplier', $supplier)
                    ->where('o.status', $status)
                    ->union($orders);
            }
        }

        $orders = $orders->get();
        return $orders;
    }
}
