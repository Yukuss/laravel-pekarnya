<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class AddressController extends Controller
{
    public function create()
    {
        return view('address.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'street' => ['required', 'string', 'max:255'],
            'house' => ['required', 'string', 'max:255'],
            'building' => ['nullable', 'string', 'max:255'],
            'apartment' => ['required', 'string', 'max:255'],
            'entrance' => ['required', 'string', 'max:255'],
            'floor' => ['required', 'string', 'max:255'],
        ]);
        $data['user_id'] = Auth::id();
        Address::create($data);
        return redirect()->route('profile')->with('success', 'Адрес добавлен!');
    }

    public function destroy(Address $address)
    {
        if ($address->user_id === Auth::id()) {
            $address->delete();
        }
        return redirect()->route('profile')->with('success', 'Адрес удалён!');
    }
}
