@props([
    'name',
    'label' => 'Nameless',
    'type' => 'text',
    'value' => ''
])

<div class="input-wrapper">
    <input type="{{ $type }}" name="{{ $name }}" placeholder=" " value='{{ $value }}'>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
</div>
