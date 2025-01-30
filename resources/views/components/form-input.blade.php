@props(['name', 'label', 'type' => 'text'])

<div class="input-wrapper">
    <input type="{{ $type }}" name="{{ $name }}" placeholder=" ">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
</div>
