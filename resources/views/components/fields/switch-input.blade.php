<div {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '3') . ' form-group '])}}>
    <div class="form-check form-switch form-check-custom form-check-solid mt-5">
        <input class="form-check-input h-20px w-30px"
               type="checkbox"
               id="{{$name}}"
               name="{{$name}}"
               {{isset($status) && $status === 'true' ? 'checked="checked"' : ''}}
               value="1"
        />

        <label class="form-check-label" for="{{$name}}">
            {{$title ?? __('Status')}}
        </label>
    </div>
</div>



