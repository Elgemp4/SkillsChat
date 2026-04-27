<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where("role", "!=", "admin")->get();

        return view("users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        $route = route("user.store", ["user" => $user->id]);
        $method = "POST";
        return view("users.edit", compact("user", "route", "method"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array_filter($request->validate([
            "name" => "required",
            "email" => "required",
            "token" => "required",
            "firstname" => "required",
            "lastname" => "required",
            "password" => "required",
        ]));

        User::create($data);

        return redirect()->route("user.index")->with("success", "User created successfully");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $route = route("user.update", ["user" => $user->id]);
        $method = "PUT";
        return view("users.edit", compact("user", "route", "method"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = array_filter($request->validate([
            "name" => "required",
            "email" => "required",
            "token" => "required",
            "firstname" => "required",
            "lastname" => "required",
            "password" => "",
        ]));

        $user->update($data);
        return redirect()->route("user.index")->with("success", "User updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with("success", "User has been deleted");
    }
}
