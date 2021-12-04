<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function main()
    {
        return view('profile/main', [
            'user' => User::getUserByUsername(auth()->user()->username),
            'title' => 'Profile | Main'
        ]);
    }

    public function address()
    {
        return view('profile/address', [
            'addresses' => Addresses::getAddressesByUsername(auth()->user()->username),
            'title' => 'Profile | Addresses'
        ]);
    }

    public function addressCreate()
    {
        return view('profile/addressCreate', [
            'title' => 'Profile | Create Address'
        ]);
    }

    public function addressStore(Request $request)
    {
        $address = $request->validate([
            'fullname' => 'required|min:3|max:255',
            'phone_number' => 'required|size:12',
            'province' => 'required|min:3|max:255',
            'city' => 'required|min:3|max:255',
            'subdistrict' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'postal_code' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255'
        ]);

        DB::table('addresses')->insert($address);
        return redirect('/profile/address');
    }
}
