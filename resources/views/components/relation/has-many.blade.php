@php
    $randId = Str::random(10);
@endphp
<div {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '6') .' form-group'])}}>
    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="{{$name}}_{{$randId}}">{{__($title)}} {!! $required ? '<sup>*</sup>' : '' !!}</label>
    <select name="{{$name}}[]" multiple="multiple"  data-control="select2" class="form-control form-control-lg form-control-solid" {{$required ? 'required' : ''}} id="{{$name}}_{{$randId}}">
        @foreach($data as $key => $value)
            <option
                @if($relationdata != [])
                      {{in_array($key, $relationdata->pluck("id")->toArray()) ? 'selected' : ""}}
                @else
                    @if(old($name))
                        {{in_array($key, old($name)) ? 'selected' : ""}}
                    @endif
                @endif
                value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>

