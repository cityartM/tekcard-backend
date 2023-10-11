@foreach(LaravelLocalization::getSupportedLocales() as $key => $value)
<div {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '6') . ' form-group mt-5'])}}>
    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="{{$name}}_{{$key}}">{{$title}} {{__("In")}} {{$value['name']}} {!!  $required ? '<sup>*</sup>' : '' !!}</label>
    <textarea
        name="{{$name}}[{{$key}}]"
        rows="5"
        class="form-control form-control-lg @if($summernote) summernote @endif form-control-solid @error($name) is-invalid @enderror"
        placeholder="{{$title}} {{__("In")}} {{$value['name']}}"
        {{$required ? 'required' : ''}}
        id="{{$name}}_{{$key}}"
    >{{old($name . "." . $key, $model ? $model->getTranslationWithFallback($name, $key) : '')}}</textarea>
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
@endforeach
