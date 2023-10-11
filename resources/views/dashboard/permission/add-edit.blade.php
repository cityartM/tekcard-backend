@extends('layouts.dash')

@section('page-title', __('Permissions'))
@section('page-heading', $edit ? $permission->name : __('Create New Permission'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>

        <li class="breadcrumb-item text-dark">
            <a href="{{ route('permissions.index') }}">@lang('Permissions')</a>
        </li>
        <span class="h-20px border-gray-200 border-start mx-4"></span>
        <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>

    </ul>
@stop

@section('content')

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
                    @lang('Permission Details')
                </h5>
                <p class="text-muted font-weight-light">
                    @lang('A general permission information.')
                </p>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="name">@lang('Name')</label>
                    <input type="text"
                           class="form-control input-solid mb-2"
                           id="name"
                           name="name"
                           placeholder="@lang('Permission Name')"
                           value="{{ $edit ? $permission->name : old('name') }}">
                </div>
                <div class="form-group">
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="display_name">@lang('Display Name')</label>
                    <input type="text"
                           class="form-control input-solid mb-2"
                           id="display_name"
                           name="display_name"
                           placeholder="@lang('Display Name')"
                           value="{{ $edit ? $permission->display_name : old('display_name') }}">
                </div>
                <div class="form-group">
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="description">@lang('Description')</label>
                    <textarea name="description"
                              id="description"
                              class="form-control input-solid">{{ $edit ? $permission->description : old('description') }}</textarea>
                </div>
            </div>
        </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">
                    {{ __($edit ? "Update Permission" : "Create Permission") }}
                </button>
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
