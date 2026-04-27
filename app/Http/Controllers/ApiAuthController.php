<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    public function login(Request $request) {
        $creds = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $user = User::where("email", $creds["email"])->firstOrFail();

        if(Auth::validate($creds)) {
            $token = $user->createToken("basic")->plainTextToken;
            return [
                "user" => $user,
                "token" => $token
            ];
        }
        else{
            return response()->json([
                "message" => "Invalid credentials"
            ],401);
        }
    }

    public function logout(Request $request) {
        $user = $request->user();

        $user->tokens()->delete();

        return response()->json([
            "message" => "Logged out"
        ]);
    }
}
