@extends('layouts.dash')

@section('page-title', __('app.Roles'))
@section('page-heading', __('app.Roles'))

@section('breadcrumbs')
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.Roles & Permissions')</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.Roles')</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">@lang('app.role_list')</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@stop

@section('content')
    @section('actions')
            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i>
                @lang('app.Add Role')
            </a>
    @endsection
    @include('partials.messages')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title"></div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>@lang('app.selected')</div>
                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">@lang('app.delete_selected')</button>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                        <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 240.512px;">
                                @lang('app.Name')
                            </th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 134.712px;">
                                @lang('app.Display Name')
                            </th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Last login: activate to sort column ascending" style="width: 134.712px;">
                                @lang('app.# of users with this role')
                            </th>
                            <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 106.5px;">
                                @lang('app.Action')
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        @if (count($roles))
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->users_count }}</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">@lang('app.Action')
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                                </svg>
                                            </span>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route('roles.edit', $role) }}" class="menu-link px-3">@lang('app.Edit')</a>
                                            </div>
                                            @if ($role->removable)
                                            <div class="menu-item px-3">
                                                <a href="{{ route('roles.destroy', $role) }}" class="menu-link px-3 delete_confirm"
                                                   title="@lang('Delete')"
                                                   data-toggle="tooltip"
                                                   data-method="DELETE"
                                                   data-confirm-title="@lang('Please Confirm')"
                                                   data-confirm-text="@lang('Are you sure that you want to delete this role?')"
                                                   data-confirm-delete="@lang('Yes, delete it!')"
                                                   data-confirm-cancel="@lang('No, cancel!')"
                                                >
                                                    @lang('app.Delete')
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><em>@lang('app.No records found.')</em></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')

@stop
