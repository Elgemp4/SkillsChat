@extends("templates.dash")

@section("title", "User's profile")


@section("page-content")
    <form action="{{$route}}" method="post" class="flex flex-col gap-2">
        @csrf
        @method($method)
        <x-input label="Username" name="name" value="{{$user->name}}" />
        <x-input label="Email" name="email" value="{{$user->email}}" />
        <x-input label="Firstname" name="firstname" value="{{$user->firstname}}" />
        <x-input label="Lastname" name="lastname" value="{{$user->lastname}}" />
        <x-input label="Tokens" name="token" value="{{$user->token}}" />
        <x-input label="Password" name="password"  />
        <button class="button button-primary mt-8 self-sta">Edit profile</button>
    </form>
@endsection


