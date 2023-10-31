@extends('layouts.dash')

@section('page-title', __('app.background'))
@section('page-heading', $edit ? $background->id : __('app.create_new_background'))



@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="{{ route('backgrounds.index') }}">@lang('app.background')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('backgrounds.update', $background))->class('form w-100')->id('background-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('backgrounds.store'))->class('form w-100')->id('background-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('app.background_phrases_details')"
                :information="__('app.a_general_background_phrases_information')"
                col="3"
            />
            <div class="col-md-9">
                
                
                <x-select-field
                    :title="__('app.type')"
                    name="type"
                    col="12"
                    class="mb-2"
                    required
                    :data="collect(App\Support\Enum\BackgroundType::lists())"
                    :model="$edit ? $background : null "
                    :isselect2="true"
                />

                <x-input-field
                    :title="__('app.image_upload')"
                    type="file"
                    name="image"
                    accept="image/*"
                    col="12"
                    row="3"
                    class="mb-2 mt-5"
                    :model=" $edit ? $background : null "
                />

            </div>

        </div>
        <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label="__($edit ? 'app.update_background' : 'app.create_background')"
                :progress="__('Please wait...')"
            />
        </div>
    </div>


</div>



@stop

@section('scripts')
<script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>
        function initializeTinyMCE(language) {
            tinymce.init({
                selector: `#kt_docs_tinymce_hidden_${language}`,
                height: "480",
                menubar: false,
                toolbar: ["styleselect fontselect fontsizeselect",
                    "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
                    "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview | code"],
                plugins: "advlist autolink link image lists charmap print preview code"
            });
        }

        // Call the initialize function for each language
        @foreach(\App\Helper\Helper::getLocalesOrder() as $locale => $value)
            initializeTinyMCE("{{ $locale }}");
        @endforeach
    </script>
@stop
