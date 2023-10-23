@extends('layouts.dash')

@section('page-title', __('app.Remarks'))
@section('page-heading', __('app.Remarks'))

@section('breadcrumbs')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.Remarks')</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.Remarks_list')</a>
        </li>
    </ul>
@stop
@section('actions')
    <a href="{{ route('remarks.create') }}" class="btn btn-sm btn-primary">
        <i class="ki-duotone ki-plus-square fs-3 ml-2 mr-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
        @lang('app.add_Remark')
    </a>
@endsection
@section('content')

    @include('partials.messages')
    <x-card-content>
        <x-card-header>
            <x-card-title>
                <x-datatable-search-input/>
            </x-card-title>
        </x-card-header>
        <x-card-body>
            <x-datatable-html>
                <td>{{__("app.title")}}</td>
                <td>{{__("app.color")}}</td>
                <td>{{__("app.UserName")}}</td>
            </x-datatable-html>
        </x-card-body>
    </x-card-content>
@stop
@section('scripts')
    <script src={{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}></script>
    <x-datatable.script
        :columns="$columns"
        :route="route('remarks.index')" 
    />
    <script>
        "use strict";
        $(function () {
            let table;
            table = $('#datatables').DataTable({
                searching: true,
                ordering: true,
                processing: true,
                serverSide: true,
                responsive: true,
                searchDelay: 500,
                @if(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == "ar")
                language: {
                    url: "{{asset("assets/datatable-ar.json")}}"
                }
                @endif

            });

            $('#datatable_search_input').keyup(function (e) {
                table.search(e.target.value).draw();
            });

            table.on("draw", function () {
                KTMenu.createInstances();
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
            });

        });
    </script>
@stop
