@extends("templates.dash")

@section("title", "User's profile")

@php
    $user = auth()->user();
@endphp

@section("page-content")
    <div class="flex flex-col">

        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Role</th>
                <th>Tokens</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->token}}</td>
                    <td>
                        <div class="flex gap-2 items-center justify-center">
                            <a class="button button-neutral" href="{{route("chat.indexs", ["user" => $user->id])}}">💬</a>
                            <a class="button button-neutral" href="{{route("user.edit", ["user" => $user->id])}}">✏️</a>
                            <form action="{{route("user.destroy",  ["user" => $user->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="button button-neutral">🗑️</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route("user.create")}}" class=" mt-8 self-start button button-primary">+ New user</a>

    </div>
@endsection


