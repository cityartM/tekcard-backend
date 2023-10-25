@extends('layouts.dash')

@section('page-title', __('app.setting_contact'))
@section('page-heading', $edit ? $settingContact->id : __('app.create_New_setting_contact'))

@section('breadcrumbs')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.setting_contact')</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.setting_contact')</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">{{ __($edit ? 'app.edit' : 'app.create') }}</li>
    </ul>
@stop

@section('content')

@section('actions')
    <a href="{{ route('plans.index') }}" class="btn btn-sm btn-primary">
        <i class="ki-duotone ki-black-left-line fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
        @lang('app.back')
    </a>
@endsection

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('settingContacts.update', $settingContact))->class('form w-100')->id('setting_contact-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('settingContacts.store'))->class('form w-100')->id('setting_contact-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('app.setting_contact_details')"
                :information="__('app.a_general_setting_contact_information.')"
                col="3"
            />
            <div class="col-md-9">

                        <x-input-field
                            :title="__('app.display_name')"
                            :placeholder="__('app.display_name')"
                            name="display_name"
                            type="text"
                            col="12"
                            class="mb-2"
                            required
                            :model="$edit ? $settingContact : null"
                        />

                        <x-select-field
                            :title="__('app.category')"
                            name="category"
                            col="12"
                            class="mb-2"
                            required
                            :data="collect(Modules\GlobalSetting\Support\Enum\ContactType::lists())"
                            :model="$edit ? $settingContact : null "
                            :isselect2="true"
                        />

                        <x-input-field
                            :title="__('app.icon_upload')"
                            type="file"
                            name="icon"
                            accept="icon/*"
                            col="12"
                            row="3"
                            class="mb-2 mt-5"
                            :model=" $edit ? $settingContact : null "
                        />

                        <x-input-field
                            :title="__('app.value')"
                            :placeholder="__('app.value')"
                            name="value"
                            type="text"
                            col="12"
                            class="mb-2"
                            required
                            :model="$edit ? $settingContact : null"
                        />

            </div>
            <div class="col-md-12 mt-2">
                <x-save-or-update-btn
                    :label="__($edit ? 'app.update_setting_contact' : 'app.create_setting_contact')"
                    :progress="__('Please wait...')"
                />
            </div>
        </div>

    </div>

</div>



@stop

@section('scripts')
    @if ($edit)

    @else

    @endif

    <script>

    </script>
@stop
