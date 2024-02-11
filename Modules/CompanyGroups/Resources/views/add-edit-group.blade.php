@extends('layouts.dash')

@section('page-title', __('app.company_groups'))
@section('page-heading', $edit ? $group->id : __('app.create_new_group'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="{{ route('companygroups.index') }}">@lang('app.company_groups')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('companygroups.update', $group))->class('form w-100')->id('group-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('companygroups.store'))->class('form w-100')->id('group-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('app.group_phrases_details')"
                :information="__('app.a_general_group_phrases_information')"
                col="3"
            />
            <div class="col-md-9">

            <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="display_name">@lang('app.display_name')</label>
                    <input type="text"
                           class="form-control input-solid mb-2"
                           id="display_name"
                           name="display_name"
                           placeholder="@lang('app.display_name')"
                           value="{{ $edit ? $group->display_name : null }}">
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <x-save-or-update-btn
                    :label="__($edit ? 'app.update_group' : 'app.create_group')"
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
