@extends('layouts.dash')

@section('page-title', __('app.permissions'))
@section('page-heading', __('app.permissions'))

@section ('breadcrumbs')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.roles_permissions')</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.permissions')</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>

        <li class="breadcrumb-item text-muted">@lang('app.permission_list')</li>
    </ul>
    <!--end::Breadcrumb-->
@stop

@section('content')
@section('actions')
    <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">
        <i class="ki-duotone ki-plus-square fs-3 ml-2 mr-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
        @lang('app.add_permission')
    </a>
@endsection
@include('partials.messages')

{!! Form::open(['route' => 'permissions.save', 'class' => 'mb-4']) !!}

    <x-card-content>

        <x-card-body>
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                        <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-125px sorting">@lang('app.name')</th>
                            @foreach ($roles as $role)
                                <th class="min-w-125px sorting">{{ $role->display_name }}</th>
                            @endforeach
                            <th class="min-w-125px sorting">@lang('app.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($permissions))
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->display_name ?: $permission->name }}</td>

                                    @foreach ($roles as $role)
                                        <td class="text-center">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                {{ html()->checkbox()
                                                         ->class('form-check-input')
                                                         ->id("cb-{$role->id}-{$permission->id}")
                                                         ->name("roles[{$role->id}][]")
                                                         ->checked($role->hasPermission($permission->name))
                                                         ->value($permission->id)
                                                }}
                                                <label class="custom-control-label d-inline"
                                                       for="cb-{{ $role->id }}-{{ $permission->id }}">

                                                </label>
                                            </div>
                                        </td>
                                    @endforeach

                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">@lang('app.action')
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                                </svg>
                                            </span>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route('permissions.edit', $permission) }}" class="menu-link px-3">
                                                    <i class="ki-duotone ki-pencil fs-3 m-1"><span class="path1"></span><span class="path2"></span></i>
                                                    @lang('app.edit')
                                                </a>
                                            </div>
                                            @if ($permission->removable)
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('permissions.destroy', $permission) }}" class="menu-link px-3 delete_confirm"
                                                       title="@lang('app.delete')"
                                                       data-toggle="tooltip"
                                                       data-method="DELETE"
                                                       data-confirm-title="@lang('app.please_confirm')"
                                                       data-confirm-text="@lang('app.are_you_sure_that_you_want_to_delete_this_row')"
                                                       data-confirm-delete="@lang('app.yes_delete_it')"
                                                       data-confirm-cancel="@lang('app.no_cancel')"
                                                    >
                                                        <i class="ki-duotone ki-trash fs-3 m-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        @lang('app.delete')
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><em>@lang('app.no_records_found')</em></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @if (count($permissions))
                <div class="row col-md-12 mt-2">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="ki-duotone ki-check-square fs-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            @lang('app.save_permissions')
                        </button>

                    </div>
                </div>
            @endif
        </div>
        </x-card-body>
    </x-card-content>

{!! Form::close() !!}

@stop
@section('scripts')
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
@stop
