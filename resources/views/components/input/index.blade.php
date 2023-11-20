@props([
    'label'
])
<div class="form-floating mb-3">
    <input {{$attributes->class([
        'form-control',
        'is-invalid' => $errors->has($attributes->get('name'))
    ])}} />
    <label for="{{$attributes->get('id')}}">{{$label}}</label>
    @error($attributes->get('name'))
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
</div>
