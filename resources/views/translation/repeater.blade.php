@props([
    'name' => 'repeater',
    'slider' => [],
])
<!--begin::Repeater-->
<div id="kt_docs_repeater_basic">
    <!--begin::Form group-->
    <div class="form-group">
        @php
            $formatter = \DragonCode\PrettyArray\Services\Formatter::make();
            $formatter->asJson(true);
            $formatted = $formatter->raw($slider);
            dump($formatted);
        @endphp

        <div data-repeater-list="{{__($name)}}" x-data="gallery_form({
                state: JSON.parse(@js($formatted)),
                name: '{{__($name)}}',
                url: '#',
                delete_url: '#',
                lang: '{{$lang}}',
            })">
            @foreach($slider as $slide)
                <div data-repeater-item class="form-group row">
                    <div class="col-md-7">
                        <input type="hidden" class="slide-image-url" name="{{`slide-old`}}" value="{{$hero_image}}">
                        <x-input-field
                            :title="__('Slide (max:2M)')"
                            type="file"
                            name="slide"
                            accept="image/*"
                            col="12"
                            row="3"
                            class="slide-image mt-5 bg-indigo-500"
                        />
                    </div>
                    <div class="col-md-3">
                        <img src="{{$slide}}" alt="{{"slide-".$loop->index}}" class="w-40 h-40 object-contain">
                    </div>
                    <div class="col-md-2 align-self-end">
                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                            <i class="la la-trash-o"></i>@lang('Delete')
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--end::Form group-->

    <!--begin::Form group-->
    <div class="form-group mt-5">
        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
            <i class="la la-plus"></i>Add
        </a>
    </div>
    <!--end::Form group-->
</div>
<!--end::Repeater-->
