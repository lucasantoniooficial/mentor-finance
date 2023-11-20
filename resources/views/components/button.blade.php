@props([
    'color' => 'primary'
])
<button {{$attributes->class([
    "btn btn-{$color}"
])}}>{{$slot}}</button>
