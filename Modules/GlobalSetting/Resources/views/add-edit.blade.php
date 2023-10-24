@extends('layouts.dash')

@section('page-title', __('app.setting_contact'))
@section('page-heading', $edit ? $settingContact->id : __('app.create_New_setting_contact'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="{{ route('settingContacts.index') }}">@lang('app.setting_contact')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

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
                :title="__('setting_contact_Phrases_Details')"
                :information="__('A_general_setting_contact_Phrases_information.')"
                col="3"
            />
            <div class="col-md-9">

             <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="display_name">@lang('app.display_name')</label>
                    <input type="text"
                           class="form-control input-solid mb-2"
                           id="display_name"
                           name="display_name"
                           placeholder="@lang('app.display_name')"
                           value="{{ $edit ? $settingContact->display_name : null }}">

                           <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="value">@lang('app.value')</label>
                    
                    <input type="text"
                           class="form-control input-solid mb-2"
                           id="value"
                           name="value"
                           placeholder="@lang('app.value')"
                           value="{{ $edit ? $settingContact->value : null }}">
                           
                        
                           <x-select-field
                                :title="__('app.type')"
                                name="type"
                                col="12"
                                class="mb-2"
                                required
                                :data="collect(Modules\GlobalSetting\Support\Enum\ContactType::lists())"
                                :model="$edit ? $settingContact->type : null "
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

                </div>
                
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
