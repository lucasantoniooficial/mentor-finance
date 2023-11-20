@props([
    'label',
    'checked' => false
])
<div class="form-check mb-3">
    <input {{$attributes->merge(['type' => 'checkbox'])->class([
        'form-check-input',
        'is-invalid' => $errors->has($attributes->get('name'))
    ])}} @checked($checked)/>
    <label class="form-check-label" for="{{$attributes->get('id')}}">{{$label}}</label>
</div>
