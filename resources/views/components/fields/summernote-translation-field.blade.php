<div {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '6') . ' form-group '])}}>
    <div class="form-group">
        <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="{{Str::snake($name)}}_{{$index}}">{{$title}} [{{$locale}}] @if(isset($required) && $locale == "ar" && $required == true) <sup>*</sup> @endif</label>
        <textarea
            id="{{Str::snake($name)}}_{{$index}}"
            name="{{$name}}[{{$locale}}]"
            class="summernote form-control form-control-lg form-control-solid @error($name) is-invalid @enderror"
            placeholder="{{$title}}"
            rows="5"
            @if(isset($required) && $locale == "ar" && $required == true) required @endif
        >
            {{old($name . '.' . $locale, isset($model) ? $model->getTranslationWithFallback($name, $locale) : null)}}
        </textarea>
        @error($name . '.' . $locale)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
