@component('mail::message')

# @lang('passwords.Hello!')

@lang('passwords.You are receiving this email because we received a password reset request for your account.')

@component('mail::button', ['url' => route('password.reset', ['token' => $token])])
    @lang('passwords.Reset Password')
@endcomponent

@lang('passwords.This password reset link will expire in :count minutes.', [
    'count' => config('auth.passwords.users.expire')
])


@lang('passwords.If you did not request a password reset, no further action is required.')


@lang('passwords.Regards'),<br>
{{ setting('app_name') }}

@endcomponent
