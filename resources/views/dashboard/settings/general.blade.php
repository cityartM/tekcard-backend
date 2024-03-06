@extends('layouts.dash')

@section('page-title', __('app.general_settings'))
@section('page-heading', __('app.general_settings'))

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">
        @lang('app.settings')
    </li>
    <li class="breadcrumb-item active">
        @lang('app.general')
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
                    <label for="name">@lang('app.name')</label>
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
                <div class="form-group mt-5">
                    <label for="name">@lang('app.delivery_price')</label>
                    <input type="text" class="form-control input-solid" id="delivery_price"
                           name="delivery_price" value="{{ setting('delivery_price') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="name">@lang('app.order_price')</label>
                    <input type="text" class="form-control input-solid" id="order_price"
                           name="order_price" value="{{ setting('order_price') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="name">@lang('app.URL_Andriod')</label>
                    <input type="text" class="form-control input-solid" id="URL_Andriod"
                           name="URL_Andriod" value="{{ setting('URL_Andriod') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="name">@lang('app.URL_Apple')</label>
                    <input type="text" class="form-control input-solid" id="URL_Apple"
                           name="URL_Apple" value="{{ setting('URL_Apple') }}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-2">
        <button type="submit" class="btn btn-primary mt-2">
            @lang('app.update')
        </button>
    </div>
</div>



{{ html()->form('POST')->close() }}
@stop
