@props([
    'type' => 'success'
])
@php
    $color = $type;
    if($type == 'error') {
        $color = 'danger';
    }
@endphp
@if(session()->has($type))
    <div class="alert alert-{{$color}}">{{session($type)}}</div>
    @php
        session()->forget($type);
    @endphp
@endif
