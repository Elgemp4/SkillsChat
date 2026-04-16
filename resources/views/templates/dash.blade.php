@extends("templates.base")


@section("content")
    <div class="flex flex-col min-h-screen">
        <header class="bg-bg-dark text-text flex justify-between px-8 py-4 items-center">
            <h1 class="text-2xl">@yield("title")</h1>
            <div class="flex gap-8 items-center">
                <p>Connected as : {{auth()->user()->name}}</p>
                <form action="{{route("logout")}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="button button-primary">Logout</button>
                </form>
            </div>
        </header>
        @session("success")
            <p class="bg-green-500 text-text text-center py-4">{{session()->get("success")}}</p>
        @endsession
        <div class="flex-1 flex">
            <aside class="border-transparent border-r-border  border-2 py-6">
                <nav class="flex flex-col gap-4 px-4">
                    <a class="button button-neutral" href="{{route("profile.show")}}">Profile</a>
                    <a class="button button-neutral" href="{{route("user.index")}}">Users</a>
                    <a class="button button-neutral" href="{{route("settings.show")}}">Website Setting</a>
                </nav>
            </aside>
            <main class="flex-1 px-8 py-16">
                @yield("page-content")
            </main>
        </div>
    </div>
@endsection


