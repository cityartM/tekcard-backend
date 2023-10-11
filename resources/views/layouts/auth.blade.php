<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpeg" href="{{ url('assets/img/Smart-Tran-32.jpeg') }}" sizes="32x32" />
    <link rel="icon" type="image/jpeg" href="{{ url('assets/img/Smart-Tran-16.jpeg') }}" sizes="16x16" />
    <title>@yield('page-title') - {{ setting('app_name') }}</title>
    <!-- Google Fonts -->

    {!! HTML::style('assets/css/appAuth.css') !!}
    {!! HTML::style('assets/css/fontawesome-all.min.css') !!}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('styles')
    @yield('header-scripts')
</head>
<body class="auth">

<div class="login-section">

    @yield('content')

</div>

{!! HTML::script('assets/js/vendor.js') !!}
{!! HTML::script('assets/js/as/app.js') !!}
{!! HTML::script('assets/js/as/btn.js') !!}
@yield('scripts')

</body>
</html>
