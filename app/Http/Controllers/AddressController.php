<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('address/create', [
            'title' => 'Address | Create'
        ]);
    }

    public function store(Request $request) {
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
        return redirect('/profile');
    }

    public function show(Address $address)
    {
        return view('address/show', [
            'addresses' => Addresses::getAddressesByUsername(auth()->user()->username),
            'title' => 'Address | Show'
        ]);
    }

    public function edit(Address $address)
    {
        //
    }

    public function update(Request $request, Address $address)
    {
        //
    }

    public function destroy(Address $address)
    {
        //
    }
}
