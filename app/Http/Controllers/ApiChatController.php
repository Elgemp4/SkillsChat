<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChatResource;
use App\Models\Chat;
use App\Models\Message;
use App\Service\APIService;
use Illuminate\Http\Request;

class ApiChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Chat::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            "system_prompt" => "required",
        ]);
        $data["user_id"] = $user->id;


        $chat = Chat::create($data);

        return ChatResource::collection($chat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        return $chat->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat, APIService $apiService)
    {
        $data = $request->validate([
            "content" => "required"
        ]);

        $data["chat_id"] = $chat->id;
        $data["role"] = "user";
        $message = Message::create($data);

        $response = $apiService->prompt($chat, $message);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
