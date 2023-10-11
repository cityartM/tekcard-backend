@extends('auth.layouts.app')

@section('content_auth')
<div class="container">
    <div class="mb-10 text-center">
        <h1 class="form-label fs-6 fw-bolder text-dark">{{ __('Reset Password') }}</h1>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <p class="text-muted mb-4 text-center font-weight-light px-2">
                            @lang('Please provide your email and pick a new password below.')
                        </p>

                        @include('partials.messages')
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email Address') }}</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" id="email" type="email" name="email" autocomplete="off" placeholder="{{ __('email@email.com') }}" value="{{ $email ?? old('email') }}" />
                            <!--end::Input-->
                        </div>


                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email Address') }}</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" id="password" type="password" name="password"
                                   autocomplete="new-password" required placeholder="{{ __('password') }}"/>
                            <!--end::Input-->
                        </div>

                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email Address') }}</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" id="password-confirm" type="password" name="password_confirmation"
                                   autocomplete="new-password" required placeholder="{{ __('confirm password') }}"/>
                            <!--end::Input-->
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>

</div>
@endsection
