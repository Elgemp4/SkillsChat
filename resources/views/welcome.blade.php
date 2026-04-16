@extends("templates.base")

@section("title", "Login")

@section("content")
    <div class="min-h-screen flex flex-col items-center justify-center">
        <form class="bg-bg border border-border rounded-lg p-4 flex flex-col gap-6" action="{{route("login")}}" method="POST">
            @csrf
            <h1 class="text-4xl text-center mb-8">Login</h1>
            <x-input label="Username" name="name"/>
            <x-input label="Password" name="password" type="password"/>
            <button class="button button-primary">Login</button>
        </form>
    </div>
@endsection


