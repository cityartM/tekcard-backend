<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == "rtl") dir="rtl" direction="rtl" style="direction:rtl;" @endif>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title') - {{ setting('app_name') }}</title>

    <link rel="icon" type="image/jpeg" href="{{ url('assets/img/Smart-Tran-32.jpeg') }}" sizes="32x32" />
    <link rel="icon" type="image/jpeg" href="{{ url('assets/img/Smart-Tran-16.jpeg') }}" sizes="16x16" />
    <meta name="application-name" content="{{ setting('app_name') }}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ url('assets/img/icons/mstile-144x144.png') }}" />

    @if(app()->getLocale() === 'ar')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@200;300;400&family=Scheherazade+New:wght@400;700&display=swap" rel="stylesheet">
    @else
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    @endif
    <!--end::Fonts-->
    <link href={{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }} rel="stylesheet" type="text/css" />

    @if(LaravelLocalization::getCurrentLocale() === 'ar')
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href={{ asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }} rel="stylesheet" type="text/css" />

        <!--end::Page Vendor Stylesheets-->
        <link href={{ asset('assets/plugins/global/plugins.bundle.rtl.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/plugins/global/plugins-custom.bundle.rtl.css') }} rel="stylesheet" type="text/css" />
        <!-- <link href="assets/plugins/global/fonts/keenthemes-icons/ki.css') }} rel="stylesheet" type="text/css" /> -->
        <link href={{ asset('assets/css/style.bundle.rtl.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/css/mycss.rtl.css') }} rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    @else
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href={{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }} rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <link href={{ asset('assets/plugins/global/plugins.bundle.css') }} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/plugins/global/plugins-custom.bundle.css') }} rel="stylesheet" type="text/css" />
        <!-- <link href="assets/plugins/global/fonts/keenthemes-icons/ki.css" rel="stylesheet" type="text/css" /> -->
        <link href={{ asset('assets/css/style.bundle.css') }} rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    @endif
    <style>
        #alertContainer.inactive{
            display: none !important;
            transition: 1s ease-in-out;
        }
    </style>
    @yield('style')
    @yield('vite')
</head>
<body  id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed {{ request()->is('admin')|| request()->is('admin/*') ? 'aside-enabled aside-fixed' :'aside-enabled aside-fixed'}}" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

<div class="d-flex flex-column flex-root app-root">
        @yield('content_lay')
    </div>

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
    <!--end::Page Custom Javascript-->
    @yield('scripts')
    <!--end::Javascript-->
    <script>
       /* jQuery(document).ready(function(){
            setTimeout(function () {
                $('#alert').addClass('hide');
            },8000);
            setTimeout(function () {
                $('#alertContainer').fadeOut("slow", function () {
                    $(this).addClass('inactive');
                });
            }, 500);
        });
*/
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
</html>

