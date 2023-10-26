@extends('layouts.dash')

@section('page-title', __('app.blog'))
@section('page-heading', $edit ? $blog->id : __('app.Create New Blog'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="{{ route('blogs.index') }}">@lang('app.blog')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('blogs.update', $blog))->class('form w-100')->id('blog-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('blogs.store'))->class('form w-100')->id('blog-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('blog Phrases Details')"
                :information="__('A general blog Phrases information.')"
                col="3"
            />
            <div class="col-md-9">
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
                                    :model=" $edit ? $blog : null "
                                />
                            </div>
                            <div class="row">
                                <x-fields.text-field
                                    :title="__('app.short_description')"
                                    name="content"
                                    col="6"
                                    type="text"
                                    required
                                    class="mt-5"
                                    :index="$locale"
                                    :locale="$locale"
                                    :model=" $edit ? $blog : null "
                                />
                            </div>
                            <br>
                            <div class="row">
                            <label for="kt_docs_tinymce_hidden_{{$locale}}"><h5>{{ __('app.content')}}</h5></label><br>
                            <textarea id="kt_docs_tinymce_hidden_{{$locale}}" name="text[{{$locale}}]" class="tox-target" >
                                {{ old("text.{$locale}", isset($model) ? $model->getTranslationWithFallback('text', $locale) : ($edit ? $blog->text : null)) }}
                            </textarea>
                </div>
                        </div>
                    @endforeach
                </x-languages-tab>
                <x-select-field
                    :title="__('app.type')"
                    name="type"
                    col="12"
                    class="mb-2"
                    required
                    :data="collect(App\Support\Enum\BlogCategories::lists())"
                    :model="$edit ? $blog : null "
                    :isselect2="true"
                    multi=true
                />

                <x-select-field
                    :title="__('app.statusb')"
                    name="status"
                    col="12"
                    class="mb-2"
                    required
                    :data="collect(App\Support\Enum\Status::lists())"
                    :model="$edit ? $blog : null "
                    :isselect2="true"
                />

                <x-input-field
                    :title="__('app.image_upload')"
                    type="file"
                    name="tumail"
                    accept="tumail/*"
                    col="12"
                    row="3"
                    class="mb-2 mt-5"
                    :model=" $edit ? $blog : null "
                />

                <div class="form-group">
                    <label for="gallery">@lang('app.upload_gallery')</label>
                    <input type="file" id="gallery" name="gallery[]" class="form-control" multiple>
                </div>

            </div>

        </div>
        <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label="__($edit ? 'app.update_blog' : 'app.create_blog')"
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
