@extends('auth.layouts.app')

@section('page-title', __('Login'))

@section('content_auth')
    <form method="POST" action="<?= url('login') ?>" class="form w-100 formlogin" novalidate="novalidate" id="kt_sign_in_form">
        @csrf
        @if (Request::has('to'))
            <input type="hidden" value="{{ Request::get('to') }}" name="to">
        @endif
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{  Session::get('error') }}
                </div>
             @endif
           @include('partials.messages')
            <h1 class="text-dark mb-3">
                {{ __('Sign In') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">
                {{ __('New Here?') }}

                <a href="{{ route('register') }}" class="link-primary fw-bolder">
                    {{ __('Create an Account') }}
                </a>
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email') }}</label>
            <!--end::Label-->

            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" placeholder="{{ __('email@email.com') }}" value="{{ old('email') }}" />
            <!--end::Input-->
        </div>

        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-10" data-kt-password-meter="true">
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('password') }}</label>
                <!--begin::Input-->
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">
                        {{ __('Forgot Password ?') }}
                    </a>
                @endif
            </div>
            <div class="position-relative mb-3">
                <input class="form-control form-control-lg form-control-solid" type="password" name="password" placeholder="{{ __('Password') }}" autocomplete="off" />
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                </span>
            </div>
            <!--end::Input-->
        </div>

        <div class="fv-row mb-10">
            <label class="form-check form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" name="remember"/>
                <span class="form-check-label fw-bold text-gray-700 fs-6">{{ __('Remember me') }}
            </span>
            </label>
        </div>

        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                @include('partials._button-indicator', ['label' =>  __('Login') ])
            </button>
            <!--end::Submit button-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Signin Form-->
    </div>
@endsection


