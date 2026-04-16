@props(["name", "label", "type" => "text", "value" => ""])

<div class="flex flex-col gap-2">
    <label class="text-text-muted" for="{{$name}}">{{$label}}</label>
    <input class="bg-bg-dark border border-border rounded-md px-7 py-2" type="{{$type}}" value="{{$value}}" id="{{$name}}" name="{{$name}}" />
    @error($name)
        <span class="text-red-500">{{$message}}</span>
    @enderror
</div>
