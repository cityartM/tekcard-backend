@extends('layouts.dash')

@section('page-title', __('app.update_user'))
@section('page-heading', $user->present()->nameOrEmail)

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.update_user')
    </li>
@stop

@section('content')

@include('partials.messages')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6" id="nav-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                           data-bs-toggle="tab"
                           href="#details"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true"
                        >
                            @lang('app.User Details')
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tab" href="#login-details">
                        <a class="nav-link" data-bs-toggle="tab"
                           href="#login-details"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            @lang('app.Login Details')
                        </a>
                    </li>
                    @if (setting('2fa.enabled'))
                        <li class="nav-item" data-bs-toggle="tab" href="#2fa">
                            <a class="nav-link" data-bs-toggle="tab"
                               href="#2fa"
                               role="tab"
                               aria-controls="home"
                               aria-selected="true">
                                @lang('app.Two-Factor Authentication')
                            </a>
                        </li>
                    @endif
                </ul>

                <div class="tab-content mt-4 " id="nav-tabContent">
                    <div class="tab-pane fade show active px-2"
                         id="details"
                         role="tabpanel"
                         aria-labelledby="nav-home-tab">
                        <form action="{{ route('users.update.details', $user) }}" method="POST" id="details-form">
                            @csrf
                            @method('PUT')
                            @include('dashboard.user.partials.details', ['profile' => false])
                        </form>
                    </div>

                    <div class="tab-pane fade px-2"
                         id="login-details"
                         role="tabpanel"
                         aria-labelledby="nav-profile-tab">
                        <form action="{{ route('users.update.login-details', $user) }}"
                              method="POST"
                              id="login-details-form">
                            @csrf
                            @method('PUT')
                            @include('dashboard.user.partials.auth')
                        </form>
                    </div>

                    @if (setting('2fa.enabled'))
                        <div class="tab-pane fade px-2" id="2fa" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <?php $route = Authy::isEnabled($user) ? 'disable' : 'enable'; ?>

                            <form action="{{ route("two-factor.{$route}") }}" method="POST" id="two-factor-form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user" value="{{ $user->id }}">
                                @include('dashboard.user.partials.two-factor')
                            </form>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.update.avatar', $user->id) }}"
                      method="POST"
                      id="avatar-form"
                      enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.user.partials.avatar', ['updateUrl' => route('user.update.avatar.external', $user->id)])
                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    {!! HTML::script('assets/js/as/btn.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('App\Http\Requests\User\UpdateDetailsRequest', '#details-form') !!}
    {!! JsValidator::formRequest('App\Http\Requests\User\UpdateLoginDetailsRequest', '#login-details-form') !!}

    @if (setting('2fa.enabled'))
        {!! JsValidator::formRequest('App\Http\Requests\TwoFactor\EnableTwoFactorRequest', '#two-factor-form') !!}
    @endif
@stop
