@extends("templates.dash")

@section("title", "User's profile")

@php
    $settings = \App\Models\WebsiteSetting::first();
@endphp

@section("page-content")
    <form action="{{route("settings.update")}}" method="post" class="flex flex-col gap-2">
        @csrf
        @method('PUT')
        <x-input label="API URL" name="api_url" value="{{$settings->api_url}}" />
        <x-input label="API Model" name="api_model" value="{{$settings->api_model}}" />
        <h2 class="text-text-muted" >Token mode</h2>
        <div class="flex gap-4">
            <label> <input name="token_mode" value="chars" type="radio" @checked($settings->token_mode == "chars") />Characters</label>
            <label> <input name="token_mode" value="message" type="radio" @checked($settings->token_mode != "chars")/>Message</label>
        </div>
        <button class="button button-primary mt-8 self-sta">Edit website settings</button>
    </form>
@endsection


