@props([
    'name',
    'label' => 'Nameless',
    'type' => 'text',
    'value' => ''
])

@if ($type === 'select')
    <div class="input-wrapper">
        <select" name="{{ $name }}" placeholder=" ">
            @foreach ($options as $option)
                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
            @endforeach
        </select>
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    </div>

@endif


<div class="input-wrapper">
    <input type="{{ $type }}" name="{{ $name }}" placeholder=" " value='{{ $value }}'>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
</div>
