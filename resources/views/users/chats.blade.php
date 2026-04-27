@extends("templates.dash")

@section("title", "User's profile")

@section("page-content")
    <div class="flex flex-col gap-4">
            @php
                $i = 0
            @endphp
            @foreach($chats as $chat)
                <div class="border border-border rounded-md p-4 w-full flex justify-between">
                    <h2>Chat n°{{$i}} ({{$chat->messages_count}} messages)</h2>
                    <a href="{{route("chat.shows", ["user" => $user, "chat" => $chat])}}" class="button button-primary">👁️</a>
                </div>
                @php
                    $i += 1;
                @endphp
            @endforeach
    </div>
@endsection


