@extends("templates.dash")

@section("title", "User's profile")

@section("page-content")
    <div class="flex flex-col gap-4 w-full">
            @foreach($messages as $message)
                <div @class(["border border-border rounded-md p-4  flex flex-col justify-between w-fit", "self-end" => $message->role == "user"])>
                    <h2>{{$message->role}}</h2>
                    <p>{{$message->content}}</p>
                </div>
            @endforeach
    </div>
@endsection


