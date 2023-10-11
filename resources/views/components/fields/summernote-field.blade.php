<div {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '6') . ' form-group mt-5'])}}>
    <label class="d-flex align-items-center fs-5 fw-bold mb-2"
           for="{{$name}}">{{$title}} {!!  $required ? '<sup>*</sup>' : '' !!}</label>
    <textarea
        name="{{$name}}"
        rows="{{$row ?? 5}}"
        class="form-control @if($summernote) summernote @endif form-control-lg @error($name) is-invalid @enderror"
        placeholder="{{$placeholder ?? $title}}" {{$required ? 'required' : ''}}
        id="{{$name}}"
    >{{old($name, $model ? $model->$name : '')}}</textarea>
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    @if(isset($hint))
        <div class="text-muted fs-7 mt-1">{{$hint}}</div>
    @endif
</div>
