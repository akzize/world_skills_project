@props(['type' => 'primary', 'cls' => ''])

<button {{$attributes->merge(['class' => "btn btn-".$type . " $cls"])}}>{{$slot}}</button>