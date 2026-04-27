<?php

namespace App\Service;

use App\Models\Chat;
use App\Models\Message;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Http;

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
        $this->apiToken = config("services.chat.key");
    }

    public function prompt(Chat $chat, Message $userMessage) {
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
        $response = Http::withHeaders(["Authorization" => "Bearer " . $this->apiToken])->post($this->apiUrl,  [
            "model" => $this->model,
            "messages" => $jsonChat
        ]);
        dd($response->getBody());

    }
}
