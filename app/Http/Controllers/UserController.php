<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register() {
        return view('user/register', [
            'title' => 'User | Register'
        ]);
    }

    public function store(Request $request) {
        if ($request['password'] != $request['confirm']) {
            return back()->withErrors([
                'confirm' => ['The provided confirmation does not match the provided password']
            ]);
        }

        $validatedUserData =  $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:5|max:255',
            'username' => 'required|min:3|max:255',
            'fullname' => 'required|min:3|max:255',
            'phone_number' => 'required|size:12',
        ]);
        $validatedUserData['password'] = Hash::make($validatedUserData['password']);

        $validatedAddressData = $request->validate([
            'fullname' => 'required|min:3|max:255',
            'phone_number' => 'required|size:12',
            'province' => 'required|min:3|max:255',
            'city' => 'required|min:3|max:255',
            'subdistrict' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'postal_code' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255'
        ]);
        $validatedAddressData['default'] = 1;

        User::create($validatedUserData);
        DB::table('addresses')->insert($validatedAddressData);

        return redirect('/user/login');
    }

    public function login() {
        return view('user/login', [
            'title' => 'Product | Edit'
        ]);
    }

    public function authenticate(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255',
            'password' => 'required|min:5|max:255',
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => ['Login failed']
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/user/login');
    }
}
