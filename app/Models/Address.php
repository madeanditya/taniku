<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    use HasFactory;

    public static function getAddressesByUsername(String $username) {
        $addresses = DB::table('addresses')->where('username', $username)->get();
        return $addresses;
    }

    public static function getDefaultAddress(String $username) {
        $address = DB::table('addresses')->where('username', $username)->where('default', 1)->first();
        return $address;
    }
}
