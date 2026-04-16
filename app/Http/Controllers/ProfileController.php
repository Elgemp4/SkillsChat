<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('profile');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = array_filter($request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => "",
        ]));
        $user = auth()->user();

        $user->update($data);

        return back()->with('success', 'Profile updated successfully');

    }


}
