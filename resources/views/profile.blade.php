@extends("templates.dash")

@section("title", "User's profile")

@php
    $user = auth()->user();
@endphp

@section("page-content")
    <form action="{{route("profile.update")}}" method="post" class="flex flex-col gap-2">
        @csrf
        @method('PUT')
        <x-input label="Username" name="name" value="{{$user->name}}" />
        <x-input label="Email" name="email" value="{{$user->email}}" />
        <x-input label="Password" name="password"  />
        <button class="button button-primary mt-8 self-sta">Edit profile</button>
    </form>
@endsection


