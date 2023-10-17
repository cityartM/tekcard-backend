@extends('layouts.dash')

@section('page-title', __('app.page_roles'))
@section('page-heading', $edit ? $role->name : __('app.create_new_role'))
@section('breadcrumbs')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.roles_permissions')</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.page_roles')</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">{{ __($edit ? 'app.edit' : 'app.create') }}</li>
    </ul>
@stop

@section('content')

@section('actions')
    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">
        <i class="ki-duotone ki-black-left-line fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
        @lang('app.back')
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
                :title="__('app.role_details')"
                :information="__('app.general_role_information')"
                col="3"
            />
            <div class="col-md-9">
                <x-input-field
                    :title="__('app.name')"
                    :placeholder="__('app.role_name')"
                    name="name"
                    type="text"
                    col="12"
                    class="mb-2"
                    required
                    :model="$edit ? $role : null"
                />
                <x-input-field
                    :title="__('app.display_name')"
                    :placeholder="__('app.display_name')"
                    name="display_name"
                    type="text"
                    col="12"
                    class="mb-2"
                    required
                    :model="$edit ? $role : null"
                />

                <x-summernote-field
                    :title="__('app.description')"
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
                :label="__($edit ?  'app.update_role' : 'app.save_role')"
                :progress="__('app.please_wait')"
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
