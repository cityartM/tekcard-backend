@extends('auth.layouts.app')

@section('content_auth')


                <!--begin::Form-->
                <form method="POST" action="<?= url('register') ?>" class="form w-100 formlogin">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-10 text-center">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">@lang('Create an Account')</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">@lang('Already have an account?')
                            <a href="../../demo1/dist/authentication/flows/basic/sign-in.html" class="link-primary fw-bolder">Sign in here</a></div>
                        <!--end::Link-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Action-->
                    <!--button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
                        <img alt="Logo" src="{{url('assets/media/svg/brand-logos/google-icon.svg')}}" class="h-20px me-3" />@lang("Sign in with Google")</button-->
                    <!--end::Action-->
                    <!--begin::Separator-->
                    <!--div class="d-flex align-items-center mb-10">
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        <span class="fw-bold text-gray-400 fs-7 mx-2">@lang("OR")</span>
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                    </div-->
                    <!--end::Separator-->
                    <!--begin::Input group-->

                    <!--begin::Col-->
                    <div class="fv-row mb-4">
                        <label class="required form-label fw-bolder text-dark fs-6">@lang("Name")</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off" />
                    </div>
                    <!--end::Col-->

                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-4">
                        <label class="form-label fw-bolder text-dark fs-6">@lang('Email Address')</label>
                        <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-6 fv-row" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6">@lang('Password')</label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                            </div>
                            <!--end::Input wrapper-->
                            <!--begin::Meter-->
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <!--end::Meter-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Hint-->
                        <div class="text-muted">@lang('Use 8 or more characters with a mix of letters, numbers.')</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-4">
                        <label class="form-label fw-bolder text-dark fs-6">@lang('Confirm Password')</label>
                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-6">
                        <label class="form-check form-check-custom form-check-solid form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1" />
                            <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
                                <a href="#" class="ms-1 link-primary">@lang('Terms and conditions')</a>.</span>
                        </label>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="submit"  class="btn btn-lg btn-primary">
                            <span class="indicator-label">@lang('Submit')</span>
                            <span class="indicator-progress">@lang('Please wait...')
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
               </form>
                <!--end::Form-->
@endsection
@section('scripts')
    <script>
     const form = document.getElementById('kt_sign_up_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Text input is required'
                            }
                        }
                    },
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'The email is required'
                            },
                            /*regexp: {
                                regexp: /@/,
                            },*/
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            },
                            stringLength: {
                                min: 8,
                                max: 20,
                            },
                            regexp: {
                                regexp: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,20}$/,
                            },
                        }
                    },
                    'confirm-password': {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation is required'
                            },
                            identical: {
                                compare: function () {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Submit button handler
        const submitButton = document.getElementById('kt_sign_up_form_submit');
        submitButton.addEventListener('click', function (e) {
            // Prevent default button action
           // e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log(status);

                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple click
                        submitButton.disabled = true;

                        // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        setTimeout(function () {
                            console.log('salam daoud');
                            // Remove loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;

                            form.submit(); // Submit form
                        }, 2000);
                    }
                });
            }
        });
    </script>
@endsection
