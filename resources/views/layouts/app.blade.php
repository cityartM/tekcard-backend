
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == "rtl") dir="rtl" direction="rtl" style="direction:rtl;" @endif>
<!--begin::Head-->
<head><base href=""/>
    <title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    @if(LaravelLocalization::getCurrentLocale() === 'ar')
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href={{ asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }} rel="stylesheet" type="text/css" />

        <!--end::Page Vendor Stylesheets-->
        <link href={{ asset('assets/plugins/global/plugins.bundle.rtl.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/css/style.bundle.rtl.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/css/mycss.rtl.css') }} rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    @else
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href={{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }} rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <link href={{ asset('assets/plugins/global/plugins.bundle.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/css/style.bundle.css') }} rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    @endif
    <!--end::Global Stylesheets Bundle-->
    @yield('style')
    @yield('vite')
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
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
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src={{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}></script>
<!--end::Page Vendors Javascript-->
<!--begin::Form repeater Javascript-->
<script src={{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}></script>
<!--end::Form repeater Javascript-->
<!--end::Page Vendors Javascript-->
<script src={{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}></script>
<!--begin::Page Custom Javascript(used by this page)-->
<script src={{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}></script>
<script src={{ asset('assets/js/custom/apps/user-management/users/list/export-users.js') }}></script>
<script src={{ asset('assets/js/custom/apps/user-management/users/list/add.js') }}></script>
<script src={{ asset('assets/js/custom/widgets.js') }}></script>
<script src={{ asset('assets/js/custom/apps/chat/chat.js') }}></script>
<script src={{ asset('assets/js/custom/modals/create-app.js') }}></script>
<script src={{ asset('assets/js/custom/modals/upgrade-plan.js') }}></script>
<script src={{ asset('assets/js/custom/custom.js') }}></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
