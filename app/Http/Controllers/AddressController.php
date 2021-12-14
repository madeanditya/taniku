<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function create() {
        return view('address/create', [
            'title' => 'Address | Create'
        ]);
    }

    public function store(Request $request) {
        
        // validating input
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

        // custom redirect (memerulukan revisi)
        DB::table('addresses')->insert($address);
        if (array_key_exists('type', $request->all())) {
            return redirect('/cart/checkout');
        } else {
            return Address::getAddressesByUsername(auth()->user()->username);
        }
    }

    public function show() {
        return view('address/show', [
            'addresses' => Address::getAddressesByUsername(auth()->user()->username),
            'title' => 'Address | Show'
        ]);
    }

    public function edit(int $id) {

        // authorization
        $address = Address::getAddressById($id);
        if ($address->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        return $address;
        // return view('address/edit', [
        //     'address' => $address,
        //     'title' => 'Address | Edit'
        // ]);
    }

    public function update(Request $request, int $id) {
        
        // validating input
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

        // updating address data
        DB::table('addresses')->where('id', $id)->update($address);
        return Address::getAddressesByUsername(auth()->user()->username);
        // return redirect('/address/show');
    }

    public function destroy(int $id) {

        // authorization
        $address = Address::getAddressById($id);
        if ($address->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // memeriksa apakah address ini merupakan default address
        if ($address->default == 1) {
            return redirect('/address/show')->with('message', 'Alamat Default tidak bisa dihapus');
        }

        DB::table('addresses')->where('id', $id)->delete();
        return Address::getAddressesByUsername(auth()->user()->username);
        // return redirect('/address/show');
    }

    public function default(int $id) {

        // authorization
        $address = Address::getAddressById($id);
        if ($address->username != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // update default address
        DB::table('addresses')->where('username', auth()->user()->username)->where('default', 1)->update(['default' => 0]);
        DB::table('addresses')->where('id', $id)->update(['default' => 1]);
        return Address::getAddressesByUsername(auth()->user()->username);
        // return redirect('/address/show');
    }
}
