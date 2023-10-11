@extends('layouts.dash')

@section('page-title', __('Authentication Settings'))
@section('page-heading', __('Authentication'))

@section('breadcrumbs')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>

        <li class="breadcrumb-item text-dark">@lang('Settings')</li>
        <span class="h-20px border-gray-200 border-start mx-4"></span>
        <li class="breadcrumb-item text-dark">@lang('Authentication')</li>

    </ul>
    <!--end::Breadcrumb-->
@stop

@section('content')

@include('partials.messages')

<!-- Nav tabs -->
<div class="card">
    <div class="card-body">
       <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6" id="nav-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active"
           data-bs-toggle="tab"
           href="#auth"
           role="tab"
           aria-controls="home"
           aria-selected="true"
        >
            <i class="fa fa-lock"></i>
            @lang('Authentication')
        </a>
    </li>
    <li class="nav-item" data-bs-toggle="tab" href="#login-details">
        <a class="nav-link" data-bs-toggle="tab"
           href="#registration"
           role="tab"
           aria-controls="home"
           aria-selected="true">
            <i class="fa fa-user-plus"></i>
            @lang('Registration')
        </a>
    </li>
</ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="auth">
                <div class="row">
                    <div class="col-md-6">
                        @include('dashboard.settings.partials.auth')
                        @include('dashboard.settings.partials.two-factor')
                    </div>
                    <div class="col-md-6">
                        @include('dashboard.settings.partials.throttling')
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="registration">
                <div class="row">
                    <div class="col-md-6">
                        @include('dashboard.settings.partials.registration')
                    </div>
                    <div class="col-md-6">
                        @include('dashboard.settings.partials.recaptcha')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
