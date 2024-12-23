<div class="mb-3">
    @if($label)
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    @if($type === 'textarea')
        <textarea id="{{ $name }}" name="{{ $name }}" class="form-control" {{ $required ? 'required' : '' }} {{ $attributes }}>{{ $value }}</textarea>
    @elseif($type === 'select')
        <select id="{{ $name }}" name="{{ $name }}" class="form-select" {{ $required ? 'required' : '' }} {{ $attributes }}>
            @foreach($options as $key => $option)
                <option value="{{ $key }}" {{ $key == $value ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        </select>
    @elseif($type === 'checkbox')
        <div class="form-check">
            <input type="checkbox" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" class="form-check-input" {{ $required ? 'required' : '' }} {{ $attributes }}>
            <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
        </div>
    @else
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" class="form-control" {{ $required ? 'required' : '' }} {{ $attributes }}>
    @endif

    @error($name)
        <div class="text-danger">{{$message}}</div>
    @enderror
</div>
