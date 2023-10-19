@extends('layouts.dash')

@section('page-title', __('app.add_user'))
@section('page-heading', __('app.add_new_user'))

@section('breadcrumbs')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.users')</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.user')</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">{{ __('app.create') }}</li>
    </ul>
@stop

@section('content')

@section('actions')
    <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">
        <i class="ki-duotone ki-black-left-line fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
        @lang('app.back')
    </a>
@endsection

@include('partials.messages')

{!! Form::open(['route' => 'users.store', 'files' => true, 'id' => 'user-form']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <x-card-left
                    :title="__('app.user_details')"
                    :information="__('app.general_user_information')"
                    col="3"
                />
                <div class="col-md-9">
                    @include('dashboard.user.partials.details', ['edit' => false, 'profile' => false])
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <x-card-left
                    :title="__('app.user_auth_details')"
                    :information="__('app.general_user_auth_information')"
                    col="3"
                />
                <div class="col-md-9">
                    @include('dashboard.user.partials.auth', ['edit' => false])
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <x-save-or-update-btn
                    :label="__('app.save_user')"
                    :progress="__('app.please_wait')"
                />
            </div>
        </div>

    </div>
{!! Form::close() !!}

<br>
@stop

@section('scripts')
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('App\Http\Requests\User\CreateUserRequest', '#user-form') !!}
@stop
