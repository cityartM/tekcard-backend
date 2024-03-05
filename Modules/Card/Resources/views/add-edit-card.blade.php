@extends('layouts.dash')

@php
    $userPlan = Auth::user()->userPlan; 
@endphp

@section('page-title', __('app.card'))
@section('page-heading', $edit ? $card->id : __('app.create_new_card'))

@section('breadcrumbs')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.card')</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.card')</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">{{ __($edit ? 'app.edit' : 'app.create') }}</li>
    </ul>
@stop

@section('content')

@section('actions')
    <a href="{{ route('cards.index') }}" class="btn btn-sm btn-primary">
        <i class="ki-duotone ki-black-left-line fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
        @lang('app.back')
    </a>
@endsection

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('cards.update', $card))->class('form w-100')->id('cards-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('cards.store'))->class('form w-100')->id('card-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
              <x-card-left
                :title="__('app.card_phrases_details')"
                :information="__('app.a_general_card_phrases_information')"
                col="3"
            />
            <div class="col-md-9">
                <div class="flex-lg-row-fluid ms-lg-5">
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#general_card_information_tab" aria-selected="true" role="tab">
                                @lang('app.general_card_information')
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#contact_apps_card_tab" aria-selected="true" role="tab">
                                @lang('app.contact_apps_card')
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <!--begin:::First Tab-->
                        <div class="tab-pane fade show active" id="general_card_information_tab" role="tabpanel">
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="card-body">
                                    <div class="row">
                                        <x-input-field
                                            :title="__('app.name')"
                                            name="name"
                                            col="6"
                                            type="text"
                                            required
                                            class="mt-5"
                                            :model=" $edit ? $card : null "
                                        />
                                        <x-input-field
                                            :title="__('app.full_name')"
                                            name="full_name"
                                            col="6"
                                            type="text"
                                            required
                                            class="mt-5"
                                            :model=" $edit ? $card : null "
                                        />
                                    </div>
                                    <div class="row">
                                        <x-input-field
                                            :title="__('app.company_name')"
                                            name="company_name"
                                            col="6"
                                            type="text"
                                            required
                                            class="mt-5"
                                            :model=" $edit ? $card : null "
                                        />
                                        <x-input-field
                                            :title="__('app.job_title')"
                                            name="job_title"
                                            col="6"
                                            type="text"
                                            required
                                            class="mt-5 mb-5"
                                            :model=" $edit ? $card : null "
                                        />
                                    </div>

                                    <div class="row">
                                        <x-input-field
                                            :title="__('app.email')"
                                            name="email"
                                            col="6"
                                            type="text"
                                            required
                                            class="mt-5"
                                            :model=" $edit ? $card : null "
                                        />
                                        <x-input-field
                                            :title="__('app.phone')"
                                            name="phone"
                                            col="6"
                                            type="text"
                                            required
                                            class="mt-5 mb-5"
                                            :model=" $edit ? $card : null "
                                        />
                                    </div>

                                    <div class="row">
                                        <x-input-field
                                            :title="__('app.url_web_site')"
                                            name="url_web_site"
                                            col="6"
                                            type="text"
                                            required
                                            class="mt-5"
                                            :model=" $edit ? $card : null "
                                        />
                                        <x-input-field
                                            :title="__('app.iban')"
                                            name="iban"
                                            col="6"
                                            type="text"
                                            required
                                            class="mt-5 mb-5"
                                            :model=" $edit ? $card : null "
                                        />
                                    </div>

                                    <div class="row">
                                        <x-input-field
                                            :title="__('app.latitude')"
                                            name="lat"
                                            col="6"
                                            type="text"
                                            required
                                            class="mt-5"
                                            :model=" $edit ? $card : null "
                                        />
                                        <x-input-field
                                            :title="__('app.longitude')"
                                            name="long"
                                            col="6"
                                            type="text"
                                            required
                                            class="mt-5 mb-5"
                                            :model=" $edit ? $card : null "
                                        />
                                        <x-input-field
                                            :title="__('app.address')"
                                            name="address"
                                            col="12"
                                            type="text"
                                            required
                                            class="mt-5 mb-5"
                                            :model=" $edit ? $card : null "
                                        />
                                        <x-input-field
                                            :title="__('app.note')"
                                            name="note"
                                            col="12"
                                            type="text"
                                            required
                                            class="mt-5 mb-5"
                                            :model=" $edit ? $card : null "
                                        />
                                    </div>


                                    <!--begin::Input group-->
                                    <div class="form-floating form-control-solid-bg rounded">

                                        <select name="background_id" class="form-select form-select-transparent" id="kt_docs_select2_floating_labels_2" data-allow-clear="true">
                                            <option></option>
                                            @foreach( $backgrounds->get() as $key => $background)
                                                <option value="{{$key}}"
                                                        data-kt-select2-social="{{$background->getFirstMedia('background')?->getFullUrl()}}">
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="floatingInputValue">{{__('app.background')}}</label>
                                    </div>
                                    <!--end::Input group-->

                                    <x-input-field
                                        :title="__('app.color')"
                                        name="color"
                                        type="color"
                                        col="2"
                                        class="mb-2 mt-5"
                                        required
                                        :model=" $edit ? $card : null "
                                    />

                                    <x-input-field
                                        :title="__('app.color_social')"
                                        name="color_social"
                                        type="color"
                                        col="2"
                                        class="mb-2 mt-5"
                                        required
                                        :model=" $edit ? $card : null "
                                    />

                                    <x-input-field
                                        :title="__('app.image_upload')"
                                        type="file"
                                        name="avatar"
                                        accept="avatar/*"
                                        col="12"
                                        row="3"
                                        class="mb-2 mt-5"
                                        :model=" $edit ? $card : null "
                                    />
                                    <br>
                                    @if($userPlan && $userPlan->canUploadMultipleImage())
                                    <div class="form-group">
                                        <label for="gallery">@lang('app.upload_gallery')</label>
                                        <input type="file" id="gallery" name="gallery[]" class="form-control" multiple>
                                    </div>
                                    @endif
                                    <br>
                                    @if($userPlan && $userPlan->canUploadPdf())
                                    <div class="form-group">
                                        <label for="pdf_file">@lang('app.pdf_file')</label>
                                        <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept=".pdf">
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!--End:::First Tab-->
                        <!--begin:::First Tab-->
                        <div class="tab-pane fade" id="contact_apps_card_tab" role="tabpanel">
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="card-body">
                                    @if($edit)
                                        @include("card::edit-contact-apps", ['card' => $card,'backgrounds' => $backgrounds])
                                    @else
                                        @include("card::contact-apps")
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!--End:::First Tab-->
                    </div>
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold  me-6 mb-5 " role="tablist">
                        <li class="nav-item ms-auto" role="presentation">
                            <a href="#" class="btn btn-sm btn-primary  d-none prev">
                                <i class="ki-duotone ki-double-left fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                {{__('app.previous')}}
                            </a>
                            <a href="#" class="btn btn-sm btn-primary  next">
                                <i class="ki-duotone ki-double-right fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                {{__('app.next')}}
                            </a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>

                </div>
            </div>


            </div>
            <div class="col-md-12 mt-2">
               <x-save-or-update-btn
                    class="d-none"
                    :label="__($edit ? 'app.update' : 'app.save')"
                    :progress="__('Please wait...')"
                />
            </div>
        </div>


    </div>


</div>



@stop

@section('scripts')
    <script src={{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}></script>
    @if ($edit)

    @else

    @endif
    <script>
        $('#saveOrUpdateBtn').addClass("d-none");
        $('.next').on('click', function() {
            $(this).addClass("d-none");
            $('.prev').removeClass("d-none");
            $('a[href="#contact_apps_card_tab"]').addClass("active");
            $('a[href="#general_card_information_tab"]').removeClass("active");
            $('#contact_apps_card_tab').addClass("fade active show");
            $('#general_card_information_tab').removeClass("fade active show");
            $('#saveOrUpdateBtn').removeClass("d-none");
        });

        $('.prev').on('click', function() {
            $(this).addClass("d-none");
            $('.next').removeClass("d-none");
            $('a[href="#contact_apps_card_tab"]').removeClass("active");
            $('a[href="#general_card_information_tab"]').addClass("active");
            $('#contact_apps_card_tab').removeClass("fade active show");
            $('#general_card_information_tab').addClass("fade active show");
            $('#saveOrUpdateBtn').addClass("d-none");
        });
    </script>
    <script>
        var optionFormat = function(item) {
            if ( !item.id ) {
                return item.text;
            }
            var span = document.createElement('span');
            var svgIcon = item.element.getAttribute('data-kt-select2-social');
            var template = '';
            template += '<img src="' + svgIcon  + '" class="rounded-circle h-40px me-2" alt="image"/>';
            template += item.text;
            span.innerHTML = template;
            return $(span);
        }

        // Init Select2 --- more info: https://select2.org/
       // var placeholder = $('#kt_docs_select2_floating_labels_2').data('placeholder')
        $('#kt_docs_select2_floating_labels_2').select2({
            placeholder: '{{ __('app.background') }}',
            minimumResultsForSearch: Infinity,
            templateSelection: optionFormat,
            templateResult: optionFormat
        });
    </script>

    <script>
        $(function () {
            $('#contact_apps_repeater').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    $(this).slideDown();
                    $(this).find('[data-kt-repeater="select2"]').select2();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                },
                ready: function(){
                    // Init select2
                    $('[data-kt-repeater="select2"]').select2();

                }

            });
            $('#contact_apps_repeater_one').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    $(this).slideDown();
                    $(this).find('[data-kt-repeater="select_1_2"]').select2();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                },
                ready: function(){
                    // Init select2
                    $('[data-kt-repeater="select_1_2"]').select2();

                }

            });
            $('#contact_apps_repeater_tow').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    $(this).slideDown();
                    $(this).find('[data-kt-repeater="select_2_2"]').select2();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                },
                ready: function(){
                    // Init select2
                    $('[data-kt-repeater="select_2_2"]').select2();

                }

            });

            $('#contact_apps_repeater_three').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    $(this).slideDown();
                    $(this).find('[data-kt-repeater="select_3_2"]').select2();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                },
                ready: function(){
                    // Init select2
                    $('[data-kt-repeater="select_3_2"]').select2();

                }

            });
        });
    </script>



@stop
