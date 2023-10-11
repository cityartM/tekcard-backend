@if($type === 'select' && isset($options))
    <select name="{{ $name }}" required="{{ $required }}">
        @foreach($options as $key => $value)
            <option value="{{ $key }}" @if($key == $model) selected @endif>{{ $value }}</option>
        @endforeach
    </select>
@elseif($type === 'time')
    <input type="time" name="{{ $name }}" value="{{ $model }}" required="{{ $required }}" placeholder="{{ $placeholder ?? '' }}">
@else
    <!-- handle other input types as before -->
@endif