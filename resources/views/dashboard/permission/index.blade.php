@extends('layouts.dash')

@section('page-title', __('app.Permissions'))
@section('page-heading', __('app.Permissions'))

@section ('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">@lang('app.Permissions')</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

{!! Form::open(['route' => 'permissions.save', 'class' => 'mb-4']) !!}

<div class="card">
    <div class="card-header border-0 pt-6">
        <div class="card-title"></div>
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-rounded">
                    <i class="fas fa-plus mr-2"></i>
                    @lang('app.Add Permission')
                </a>
            </div>
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
                        <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px sorting">@lang('app.Name')</th>
                                    @foreach ($roles as $role)
                                        <th class="min-w-125px sorting">{{ $role->display_name }}</th>
                                    @endforeach
                                    <th class="min-w-125px sorting">@lang('app.Action')</th>
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
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">@lang('app.Action')
                                                <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('permissions.edit', $permission) }}" class="menu-link px-3">
                                                        @lang('app.Edit')
                                                    </a>
                                                </div>
                                                @if ($permission->removable)
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('permissions.destroy', $permission) }}" class="menu-link px-3 delete_confirm"
                                                       title="@lang('Delete')"
                                                       data-toggle="tooltip"
                                                       data-method="DELETE"
                                                       data-confirm-title="@lang('Please Confirm')"
                                                       data-confirm-text="@lang('Are you sure that you want to delete this permission?')"
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
            @if (count($permissions))
                <div class="row col-md-12 mt-2">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">@lang('Save Permissions')</button>
                    </div>
                </div>
            @endif
        </div>
</div>
{!! Form::close() !!}

@stop
@section('scripts')
<script>
    $("#kt_datatable_example_1").DataTable();
</script>
@stop
