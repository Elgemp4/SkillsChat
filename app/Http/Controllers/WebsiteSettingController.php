<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebsiteSettingRequest;
use App\Http\Requests\UpdateWebsiteSettingRequest;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view("settings");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            "api_url" => "required",
            "api_model" => "required",
            "token_mode" => "required",
        ]);

        WebsiteSetting::first()->update($data);

        return back()->with("success", "Website Setting Updated Successfully");
    }
}
