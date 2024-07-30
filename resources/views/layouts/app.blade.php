
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == "rtl") dir="rtl" direction="rtl" style="direction:rtl;" @endif>
<!--begin::Head-->
<head><base href=""/>
    <title>@yield('page-title') - {{ setting('app_name') }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="TekCard" />
    <meta name="keywords" content="TekCard" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="{{ url('assets/media/logos/icon.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ url('assets/media/logos/icon.png') }}" sizes="16x16" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    @if(LaravelLocalization::getCurrentLocale() === 'ar')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Cairo:wght@300;400;500&display=swap" rel="stylesheet">

        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href={{ asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }} rel="stylesheet" type="text/css" />

        <!--end::Page Vendor Stylesheets-->
        <link href={{ asset('assets/plugins/global/plugins.bundle.rtl.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/css/style.bundle.rtl.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/css/mycss.rtl.css') }} rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    @else
        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href={{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }} rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <link href={{ asset('assets/plugins/global/plugins.bundle.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/css/style.bundle.css') }} rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    @endif

    @vite(['resources/css/app-dashboard.css'])
    <!--end::Global Stylesheets Bundle-->
    @yield('style')
    @yield('vite')
    <style>
        #alertContainer.inactive{
            display: none !important;
            transition: 1s ease-in-out;
        }
        body{
            font-family: 'Amiri','Inter', serif;
            font-family: 'Cairo','Inter', sans-serif;
        }
   </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
<!--end::Theme mode setup on page load-->
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    @yield('content_lay')
</div>
<!--end::App-->
<script>var hostUrl = "assets/";</script>

<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src={{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}></script>
<script src={{ asset('assets/plugins/global/plugins.bundle.js') }}></script>
<script src={{ asset('assets/js/scripts.bundle.js') }}></script>
<script src={{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}></script>
<script src={{ asset('assets/js/custom/custom.js') }}></script>
@yield('scripts')

</body>
<!--end::Body-->
</html>
