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
                    <label for="name">@lang('app.url_android')</label>
                    <input type="text" class="form-control input-solid" id="url_android"
                           name="url_android" value="{{ setting('url_android') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="name">@lang('app.url_apple')</label>
                    <input type="text" class="form-control input-solid" id="url_apple"
                           name="url_apple" value="{{ setting('url_apple') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="name">@lang('app.whatsApp')</label>
                    <input type="text" class="form-control input-solid" id="whatsApp"
                           name="whatsApp" value="{{ setting('whatsApp') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="name">@lang('app.privacy-policy')</label>
                    <input type="text" class="form-control input-solid" id="privacy-policy"
                           name="privacy-policy" value="{{ setting('privacy-policy') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="name">@lang('app.about')</label>
                    <input type="text" class="form-control input-solid" id="about"
                           name="about" value="{{ setting('about') }}">
                </div>

                <div class="form-group mt-5">
                    <label for="name">@lang('app.bronze_level')</label>
                    <input type="text" class="form-control input-solid" id="bronze_level"
                           name="bronze_level" value="{{ setting('bronze_level') }}">
                </div>

                <div class="form-group mt-5">
                    <label for="name">@lang('app.silver_level')</label>
                    <input type="text" class="form-control input-solid" id="silver_level"
                           name="silver_level" value="{{ setting('silver_level') }}">
                </div>

                <div class="form-group mt-5">
                    <label for="name">@lang('app.gold_level')</label>
                    <input type="text" class="form-control input-solid" id="gold_level"
                           name="gold_level" value="{{ setting('gold_level') }}">
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
