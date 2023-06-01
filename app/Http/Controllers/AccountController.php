<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index($token)
    {
        $customer = Customer::whereToken($token)->first();
        return Inertia::render('AccountSetting', [
            'customer' => $customer
        ]);
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'sometimes',
            'email' => 'sometimes',
            'phone' => 'sometimes',
            'token' => 'required|string',
        ]);

        $customer = Customer::updateOrCreate(['token' => $request->token], $request->all());

        return redirect()->route('home.profile', $request->token);
    }

    public function upload_photo(Request $request)
    {
        $request->validate([
            'file' => 'required|image'
        ]);

        $customer = Customer::updateOrCreate(['token' => $request->token], ['image' => '/storage/' . $request->file('file')->storePublicly('product')]);

        return redirect()->route('home.profile', $request->token);

    }
}
