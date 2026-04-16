<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin(){
        return view("login");
    }

    public function login(Request $request){
        $creds = $request->validate([
            "name" => "required",
            "password" => "required"
        ]);

        if(Auth::attempt($creds)){
            return redirect()->route("profile.show");
        }
        else{
            throw ValidationException::withMessages(["name" => "Invalid Credentials", "password" => "Invalid Credentials"]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }
}
