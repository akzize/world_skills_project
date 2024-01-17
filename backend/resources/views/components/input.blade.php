@props(['type' => 'text', 'hint' => '', 'name' => ''])

<input type="{{ $type }}" {{ $attributes->merge(['class' => 'form-control ']) }} name="{{$name}}" placeholder="{{$hint}}">

