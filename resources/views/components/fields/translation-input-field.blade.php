@foreach(LaravelLocalization::getSupportedLocales() as $key => $value)
    <div {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '6') . ' form-group '])}}>
        <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="{{$name}}_{{$key}}">{{$title}} {{__("In")}} {{$value['name']}} {!!  $required ? '<sup>*</sup>' : '' !!}</label>
        <input type="{{$type ?? 'text'}}"
               name="{{$name}}[{{$key}}]"
               value="{{old($name . "." . $key, $model ? $model->getTranslationWithFallback($name, $key) : '')}}"
               class="form-control form-control-lg form-control-solid @error($name . "." . $key) is-invalid @enderror"
               placeholder="{{$title}} {{__("In")}} {{$value['name']}}" {{$required ? 'required' : ''}}
               id="{{$name}}_{{$key}}"
        />
        @error($name . '.' . $key)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
@endforeach
