@extends('layouts.appDash')

@section('page-title', __('My Profile'))
@section('page-heading', __('My Profile'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.My Profile')
    </li>
@stop

@section('content')

@include('partials.messages')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                           id="details-tab"
                           data-toggle="tab"
                           href="#details"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            @lang('app.User Details')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           id="authentication-tab"
                           data-toggle="tab"
                           href="#login-details"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            @lang('app.Login Details')
                        </a>
                    </li>
                    @if (setting('2fa.enabled'))
                        <li class="nav-item">
                            <a class="nav-link"
                               id="authentication-tab"
                               data-toggle="tab"
                               href="#2fa"
                               role="tab"
                               aria-controls="home"
                               aria-selected="true">
                                @lang('app.Two-Factor Authentication')
                            </a>
                        </li>
                    @endif
                </ul>

                <div class="tab-content mt-4" id="nav-tabContent">
                    <div class="tab-pane fade show active px-2"
                         id="details"
                         role="tabpanel"
                         aria-labelledby="nav-home-tab">
                        <form action="{{ route('profile.update.details') }}" method="POST" id="details-form">
                            @method('PUT')
                            @csrf
                            @include('dashboard.user.partials.details', ['profile' => true])
                        </form>
                    </div>

                    <div class="tab-pane fade px-2"
                         id="login-details"
                         role="tabpanel"
                         aria-labelledby="nav-profile-tab">
                        <form action="{{ route('profile.update.login-details') }}"
                              method="POST"
                              id="login-details-form">
                            @method('PUT')
                            @csrf
                            @include('dashboard.user.partials.auth')
                        </form>
                    </div>

                    @if (setting('2fa.enabled'))
                        <div class="tab-pane fade px-2" id="2fa" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <?php $route = Authy::isEnabled($user) ? 'disable' : 'enable'; ?>

                            <form action="{{ route("two-factor.{$route}") }}" method="POST" id="two-factor-form">
                                @csrf
                                @include('dashboard.user.partials.two-factor')
                            </form>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("profile.update.avatar") }}"
                      method="POST"
                      id="avatar-form"
                      enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.user.partials.avatar', ['updateUrl' => route('profile.update.avatar-external')])
                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')

@stop
