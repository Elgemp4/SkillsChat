<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\Chat;
use App\Models\Scopes\UserScope;
use App\Models\User;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexs(User $user)
    {
        $chats = $user->chats()->withoutGlobalScope(UserScope::class)->withCount("messages")->get();
        return view('users.chats',compact("user", 'chats'));
    }

    /**
     * Display the specified resource.
     */
    public function shows(User $user, int $chat)
    {
        $chat = Chat::withoutGlobalScope(UserScope::class)->findOrFail($chat);
        $messages = $chat->messages()->get();
        return view('users.chat',compact("user", 'messages'));
    }
}
