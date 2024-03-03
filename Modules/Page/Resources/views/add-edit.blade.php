@extends('layouts.dash')

@section('page-title', __('app.custom_pages'))
@section('page-heading', $edit ? $page->id : __('app.create_new_page'))



@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="{{ route('pages.index') }}">@lang('app.custom_pages')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('pages.update', $page))->class('form w-100')->id('page-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('pages.store'))->class('form w-100')->id('page-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('app.page_phrases_details')"
                :information="__('app.a_general_page_phrases_information')"
                col="3"
            />
            <div class="col-md-9">
           

<label class="d-flex align-items-center fs-5 fw-bold mb-2" for="name">@lang('app.name')</label>
        <input type="text"
               class="form-control input-solid mb-2"
               id="name"
               name="name"
               placeholder="@lang('app.name')"
               value="{{ $edit ? $page->name : null }}">
    
                <x-languages-tab>
                    @foreach(\App\Helper\Helper::getLocalesOrder() as $locale => $value)
                        <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="language_{{$locale}}" role="tabpanel" aria-labelledby="language_{{$locale}}">
                            <div class="row">
                                <x-fields.text-field
                                    :title="__('app.title')"
                                    name="title"
                                    col="6"
                                    type="text"
                                    required
                                    class="mt-5"
                                    :index="$locale"
                                    :locale="$locale"
                                    :model=" $edit ? $page : null "
                                />
                            </div>
                           
                            <div class="row">

                                <x-fields.summernote-translation-field
                                    name="short_description"
                                    class="mt-5"
                                    :title="__('app.short_description')"
                                    required
                                    col="12"
                                    :index="$locale"
                                    :locale="$locale"
                                    :model="$edit ? $page : null "
                                />



                            </div>
                            <br>
                            <div class="row">
                                <label for="kt_docs_tinymce_hidden_{{$locale}}"><h5>{{ __('app.content')}}</h5></label><br>
                                <textarea id="kt_docs_tinymce_hidden_{{$locale}}" name="description[{{$locale}}]" class="tox-target" >
                                    {{ old("description.{$locale}", isset($model) ? $model->getTranslationWithFallback('description', $locale) : ($edit ? $page->description : null)) }}
                                </textarea>
                            </div>
                        </div>
                    @endforeach
                </x-languages-tab>
                <x-input-field
                    :title="__('app.image_upload')"
                    type="file"
                    name="thumbnail"
                    accept="thumbnail/*"
                    col="12"
                    row="3"
                    class="mb-2 mt-5"
                    :model=" $edit ? $page : null "
                />

            </div>

          

        </div>
        <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label="__($edit ? 'app.update_page' : 'app.create_page')"
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
