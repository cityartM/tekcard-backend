@component('mail::message')

# @lang('mail.Hello!')

@lang('mail.an_account_has_been_created_for_you', ['app' => setting('app_name'),'company' => $user->company?->full_name ?? 'TeKCard'])


@lang('mail.to_view_user_details')<br>

@lang('mail.your_email') {{ $user->email }}<br>
@lang('mail.your_password') {{ $password }}<br>

@component('mail::button-Android', ['url' => env("ANDROID_APP_URL"), 'color' => 'success'])
@endcomponent
@component('mail::button-Apple', ['url' => env("APPLE_APP_URL"), 'color' => 'success'])
@endcomponent

@lang('If you have any questions, you can contact our support center.')


<br>
{{ setting('app_name') }}

@endcomponent
