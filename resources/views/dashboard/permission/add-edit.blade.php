@extends('layouts.dash')

@section('page-title', __('app.permissions'))
@section('page-heading', $edit ? $permission->name : __('app.create_new_permission'))

@section('breadcrumbs')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.roles_permissions')</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.permissions')</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">{{ __($edit ? 'app.edit' : 'app.create') }}</li>
    </ul>
@stop

@section('content')
@section('actions')
    <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-primary">
        <i class="ki-duotone ki-black-left-line fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
        @lang('app.back')
    </a>
@endsection
@include('partials.messages')

@if ($edit)
    {!! Form::open(['route' => ['permissions.update', $permission], 'method' => 'PUT', 'id' => 'permission-form']) !!}
@else
    {!! Form::open(['route' => 'permissions.store', 'id' => 'permission-form']) !!}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('app.permission_details')
                </h5>
                <p class="text-muted font-weight-light">
                    @lang('app.general_permission_information')
                </p>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="name">@lang('Name')</label>
                    <input type="text"
                           class="form-control input-solid mb-2"
                           id="name"
                           name="name"
                           placeholder="@lang('app.permission_name')"
                           value="{{ $edit ? $permission->name : null }}">
                </div>
                <div class="form-group">
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="display_name">@lang('app.display_name')</label>
                    <input type="text"
                           class="form-control input-solid mb-2"
                           id="display_name"
                           name="display_name"
                           placeholder="@lang('app.display_name')"
                           value="{{ $edit ? $permission->display_name : null }}">
                </div>
                <div class="form-group">
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="description">@lang('app.description')</label>
                    <textarea name="description"
                              id="description"
                              class="form-control input-solid">{{ $edit ? $permission->description : null }}</textarea>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-2">
            <x-save-or-update-btn
            :label="__($edit ?  'app.update_permission' : 'app.save_permission')"
            :progress="__('app.please_wait')"
            />
        </div>
    </div>
</div>



@stop

@section('scripts')
    @if ($edit)
        {!! JsValidator::formRequest('App\Http\Requests\Permission\UpdatePermissionRequest', '#permission-form') !!}
    @else
        {!! JsValidator::formRequest('App\Http\Requests\Permission\CreatePermissionRequest', '#permission-form') !!}
    @endif
@stop
