@extends('layouts.dash')

@section('page-title', __('app.contact_us'))
@section('page-heading', __('app.contact_us'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">@lang('app.contact_us_list')</li>
    </ul>
@stop

@section('content')

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
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="contact: activate to sort column ascending" style="width: 240.512px;">
                                @lang('app.email')
                            </th>
                            <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 106.5px;">
                                @lang('app.first_name')
                            </th>
                            <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 106.5px;">
                                @lang('app.last_name')
                            </th>
                            <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 106.5px;">
                                @lang('app.message')
                            </th>
                            <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 106.5px;">
                                @lang('app.actions')
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        @if (count($contacts))
                            @foreach ($contacts as $contacts)
                             <tr>
                                <td>{{ $contacts->email}}</td>
                                <td>{{ $contacts->first_name}}</td>
                                <td>{{ $contacts->last_name}}</td>
                                <td>{{ $contacts->message}}</td>
                                
                                <td class="text-end">
                                    <form action="{{ route('contactus.destroy', $contacts->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light btn-active-light-primary btn-sm" data-toggle="tooltip" title="@lang('Delete')" onclick="return confirm('Are you sure you want to delete this contact?')">@lang('app.delete')</button>
                                    </form>
                                </td>
                             </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><em>@lang('app.No_records_found')</em></td>
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
