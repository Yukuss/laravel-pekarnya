<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $addresses = $user->addresses ?? Address::where('user_id', $user->id)->get();
        return view('profile.show', compact('user', 'addresses'));
    }
}
