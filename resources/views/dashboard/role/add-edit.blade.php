@extends('layouts.dash')

@section('page-title', __('Roles'))
@section('page-heading', $edit ? $role->name : __('Create New Role'))

@section('breadcrumbs')
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.Roles & Permissions')</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.Roles')</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">{{ __($edit ? 'Edit' : 'Create') }}</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@stop

@section('content')

@section('actions')
    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus mr-2"></i>
        @lang('app.Back')
    </a>
@endsection

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('roles.update', $role))->class('form w-100')->id('role-form')->open() }}
@else
    {{ html()->form('POST',route('roles.store'))->class('form w-100')->id('role-form')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('Role Details')"
                :information="__('A general role information.')"
                col="3"
            />
            <div class="col-md-9">
                <x-input-field
                    :title="__('Name')"
                    :placeholder="__('Role Name')"
                    name="name"
                    col="12"
                    class="mb-2"
                    required
                    :model="$edit ? $role : null"
                />
                <x-input-field
                    :title="__('Display Name')"
                    name="display_name"
                    col="12"
                    class="mb-2"
                    required
                    :model="$edit ? $role : null"
                />

                <x-summernote-field
                    :title="__('Description')"
                    name="description"
                    col="12"
                    row="3"
                    class="mb-2"
                    required
                    :model=" $edit ? $role : null "
                />
            </div>
        </div>
        <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label="__($edit ? 'Update Role' : 'Create Role')"
                :progress="__('Please wait...')"
            />
        </div>
    </div>


</div>



@stop

@section('scripts')
    @if ($edit)
        {!! JsValidator::formRequest('App\Http\Requests\Role\UpdateRoleRequest', '#role-form') !!}
    @else
        {!! JsValidator::formRequest('App\Http\Requests\Role\CreateRoleRequest', '#role-form') !!}
    @endif
@stop
