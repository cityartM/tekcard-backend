@php
    $randId = Str::random(10);
@endphp

<div {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '6') .' form-group'])}}>
    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="{{$name}}_{{$randId}}">{{__($title)}} {!! $required ? '<sup>*</sup>' : '' !!}</label>
    <select @if($multi) name="{{$name}}[]" multiple="multiple" @else name="{{$name}}" @endif @if($isselect2) data-control="select2" @endif
            class="form-control form-control-lg form-control-solid" {{$required ? 'required' : ''}} id="{{$name}}_{{$randId}}">
        @if($required)
            <option value="" selected disabled>{{__('Choose An Option')}}</option>
        @endif
        @foreach($data as $key => $value)
            <option
                @if($multi)
                    @if(!is_null($model))
                        {{in_array($value, $multidata->toArray()) ? 'selected' : ""}}
                    @else
                        @if(old($name))
                            {{in_array($value, old($name)) ? 'selected' : ""}}
                        @endif
                    @endif
                @else
                    @if(!is_null($model))
                        {{ old($name) && old($name) == $key ? "selected" : ($key == $model->$name && !old($name)? "selected" : "") }}
                    @else
                        {{old($name) && old($name) == $key ? "selected" : ""}}
                    @endif
                @endif
                value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>

