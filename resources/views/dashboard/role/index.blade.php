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

@section("content")
    @section('actions')
        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus mr-2"></i>
            @lang('app.Add Role')
        </a>
    @endsection
    @include('partials.messages')
    <x-card-content>
        <x-card-header>
            <x-card-title>
                <x-datatable-search-input/>
            </x-card-title>
        </x-card-header>
        <x-card-body>
            <x-datatable-html>
                <td>{{__("Name")}}</td>
                <td>{{__("Display Name")}}</td>
                <td>{{__("Display Name")}}</td>
                <td>{{__("User Count")}}</td>
                <td>{{__("Created At")}}</td>
            </x-datatable-html>
        </x-card-body>
    </x-card-content>
@endsection

@section("scripts")
    <script>
        $(function () {
            let table;
            table = $('#datatables').DataTable({
                ordering: true,
                processing: true,
                serverSide: true,
                responsive: true,
                searchDelay: 1000,
            });
            $('#datatable_search_input').keyup(function () {
                table.search($(this).val()).draw();
            });
        });
    </script>
    <x-datatable.script
        :columns="$columns"
        :route="route('roles.index')"
    />

@endsection
