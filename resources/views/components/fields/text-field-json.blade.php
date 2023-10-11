<div {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '6') . ' form-group '])}}>
    <div class="form-group">
        <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="{{\Str::snake($name)}}_{{$index}}">{{$title}} [{{$locale}}] @if(isset($required) && $locale == LaravelLocalization::getCurrentLocale() && $required == true) <sup>*</sup> @endif</label>
        <input
            id="{{\Str::snake($name)}}_{{$index}}"
            type="text"
            value="{{old($name . '.' . $locale, isset($model) ? $model[$locale] : null)}}"
            name="{{$name}}[{{$locale}}]"
            class="form-control form-control-lg form-control @error($name . '.' . $locale) is-invalid @enderror"
            placeholder="{{$title}}"
            @if(isset($required) && $locale == LaravelLocalization::getCurrentLocale() && $required == true) required @endif
        />
        @error($name . '.' . $locale)
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
