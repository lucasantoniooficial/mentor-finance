@props([
    'label'
])

<div class="form-floating mb-3">
    <select {{$attributes->class([
        'form-select',
        'is-invalid' => $errors->has($attributes->get('name'))
    ])}}>
        {{$slot}}
    </select>
    @error($attributes->get('name'))
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
