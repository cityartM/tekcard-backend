@extends('layouts.dash')

@section('page-title', __('General Settings'))
@section('page-heading', __('General Settings'))

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">
        @lang('Settings')
    </li>
    <li class="breadcrumb-item active">
        @lang('General')
    </li>
@stop

@section('content')

@include('partials.messages')


{{ html()->form('POST')->action(route('settings.general.update'))->id('general-settings-form')->open() }}

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">@lang('Name')</label>
                    <input type="text" class="form-control input-solid" id="app_name"
                           name="app_name" value="{{ setting('app_name') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="name">@lang('app.app_version')</label>
                    <input type="text" class="form-control input-solid" id="app_version"
                           name="app_version" value="{{ setting('app_version') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="name">@lang('app.free_days')</label>
                    <input type="text" class="form-control input-solid" id="free_days"
                           name="free_days" value="{{ setting('free_days') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="name">@lang('app.price_subscribe')</label>
                    <input type="text" class="form-control input-solid" id="price_subscribe"
                           name="price_subscribe" value="{{ setting('price_subscribe') }}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-2">
        <button type="submit" class="btn btn-primary mt-2">
            @lang('Update')
        </button>
    </div>
</div>



{{ html()->form('POST')->close() }}
@stop
