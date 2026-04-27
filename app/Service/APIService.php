<?php

namespace App\Service;

use App\Models\Chat;
use App\Models\Message;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class APIService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $settings = WebsiteSetting::first();
        $this->apiUrl = $settings->api_url;
        $this->model = $settings->api_model;
        $this->tokenMode = $settings->token_mode;
        $this->apiToken = config("services.chat.key");
    }

    public function prompt(Chat $chat, Message $userMessage) : Message {
        $user = auth()->user();

        if($this->tokenMode == "message") {
            $user->token = $user->token - 1;
        }
        else{
            $user->token = $user->token - strlen($userMessage->content);
        }

        if($user->token < 0){
            throw ValidationException::withMessages([
                "token" => "Not enough token left"
            ]);
        }

        $user->save();

        $jsonChat = $chat->messages()->get()->map(function ($message) {
            return [
                "role" => $message->role,
                "content" => $message->content,
            ];
        })->toArray();

        array_push($jsonChat, [
            "role" => $userMessage->role,
            "content" => $userMessage->content,
        ]);
        $response = Http::withOptions(["stream" => "true"])->withHeaders(["Authorization" => "Bearer " . $this->apiToken])->post($this->apiUrl,  [
            "model" => $this->model,
            "messages" => $jsonChat
        ])->json();

        return Message::create([
            "chat_id" => $chat->id,
            "content" => $response["choices"][0]["message"]["content"],
            "role" => "assistant"
        ]);
    }
}
