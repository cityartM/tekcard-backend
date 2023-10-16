
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == "rtl") dir="rtl" direction="rtl" style="direction:rtl;" @endif>
<!--begin::Head-->
<head><base href=""/>
    <title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title') - {{ setting('app_name') }}</title>




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
    <!--end::Global Stylesheets Bundle-->
    @yield('style')
    @yield('vite')
    <style>
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
@yield('scripts')

<script>
    $('.delete_confirm').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: $(this).data("confirm-title"),
            text: $(this).data("confirm-text"),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: $(this).data("confirm-delete"),
            cancelButtonText: $(this).data("confirm-cancel"),
        }).then((result) => {
            if (result.isConfirmed) {
                // Create a form element
                var form = document.createElement("form");

                // Set form attributes
                const hrefValue = $(this).attr('href');

                form.setAttribute("action", hrefValue);
                form.setAttribute("method", "POST");
                form.setAttribute("id", "deleteRoleForm");

                // Create a hidden input field for the DELETE method
                var methodField = document.createElement("input");
                methodField.setAttribute("type", "hidden");
                methodField.setAttribute("name", "_method");
                methodField.setAttribute("value", "DELETE");
                form.appendChild(methodField);

                // Create a CSRF token field
                var csrfField = document.createElement("input");
                csrfField.setAttribute("type", "hidden");
                csrfField.setAttribute("name", "_token");
                csrfField.setAttribute("value", "{{ csrf_token() }}");
                form.appendChild(csrfField);
                // Find the anchor element
                var anchor = document.querySelector(".delete_confirm");
                // Replace the anchor with the form
                anchor.parentNode.replaceChild(form, anchor);
                // Append the anchor to the form
                form.appendChild(anchor);
                form.submit();
            }
        })
    });
</script>
</body>
<!--end::Body-->
</html>
