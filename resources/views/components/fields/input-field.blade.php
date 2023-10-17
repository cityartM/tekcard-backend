<div  {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '6') . ' form-group '])}}>
    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="{{$name}}">{{$title}} {!!  $required ? '<sup>*</sup>' : '' !!}</label>
    <input type="{{$type ?? 'text'}}" name="{{$name}}"
           @if(isset($type) && $type == "number")
               step="any"
           @endif
           @if(isset($type) && $type !== "file")
               @if(isset($value))
                   value="{{$value}}"
               @else
                   value="{{old($name) ? old($name) : ( $model ? $model->$name : '')}}"
               @endif
           @endif
           class="form-control input-solid @error($name) is-invalid @enderror" placeholder="{{$placeholder ?? $title}}" {{$required ? 'required' : ''}} id="{{$name}}" />
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @if(isset($hint))
        <div class="text-muted fs-7 mt-1">{{$hint}}</div>
    @endif
</div>


