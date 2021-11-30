<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function main() {
        return view('profile/main', [
            'title' => 'Profile | Main'
        ]);
    }
}
