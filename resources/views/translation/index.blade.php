@php use DragonCode\PrettyArray\Services\Formatter; @endphp
@extends('layouts.dash')

@section('page-title', __('Translation'))
@section('page-heading', __('Translation'))

@section('vite')
    @vite(['resources/css/app-dashboard.css', 'resources/js/app.js'])
@endsection

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">@lang('app.Translation')</li>
    </ul>
@stop

@section('content')
    @include('partials.messages')
    <div>
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title"></div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <a href="{{ route('translation.add') }}" class="btn btn-primary btn-rounded">
                            <i class="fas fa-plus mr-2"></i>
                            @lang('Add key')
                        </a>
                    </div>
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>@lang('app.selected')</div>
                        <button type="button" class="btn btn-danger"
                                data-kt-user-table-select="delete_selected">@lang('app.delete_selected')</button>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <form class="table-responsive" action="{{ route('translations', ['lang' => $lang] ) }}" method="POST">
                        @csrf
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                               id="kt_table_users">
                            <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                    colspan="1" aria-label="Translation: activate to sort column ascending"
                                    style="width: 240.512px;">
                                    @lang('key')
                                </th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                    colspan="1" aria-label="Translation: activate to sort column ascending"
                                    style="width: 240.512px;">
                                    @lang('Value')
                                </th>

                                <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Actions" style="width: 106.5px;">
                                    @lang('Action')
                                </th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold">

                            @if (count($translations))
                                @foreach ($translations as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td><input type="text" name="values[{{ $key }}]" value="{{ $value }}"></td>

                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="black"></path>
                                                </svg>
                                            </span>
                                            </a>
                                            <div
                                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">

                                                <div class="menu-item px-3">
                                                    <a href="" class="menu-link px-3 delete_confirm"
                                                       title="@lang('Delete')"
                                                       data-toggle="tooltip"
                                                       data-method="DELETE"
                                                       data-confirm-title="@lang('Please Confirm')"
                                                       data-confirm-text="@lang('Are you sure that you want to delete this Advices?')"
                                                       data-confirm-delete="@lang('Yes, delete it!')"
                                                       data-confirm-cancel="@lang('No, cancel!')"
                                                    >
                                                        @lang('Delete')
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4"><em>@lang('No records found.')</em></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary btn-rounded">
                            <i class="fas fa-plus mr-2"></i>
                            @lang('Save')
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card mt-10">
            <div class="card-body">
                <div>
                    <div class="row">
                        <x-card-left
                            :title="__('Landing page Images')"
                            :information="__('Landing page Images.')"
                            col="3"
                        />
                        <div class="col-md-9 row gap-y-6">
                            <div class="col-2">
                                {{ 'Hero Image' }}
                            </div>
                            <div class="col-10 flex items-center gap-8">
                                @if($hero_image)
                                    <div class="w-40 flex flex-col gap-4">
                                        <img src="{{$hero_image->getUrl()}}" alt="file.name" class="w-40 h-40 object-contain">
                                        <form action="{{ route('media.destroy', $hero_image->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light-danger">
                                                <i class="la la-trash-o"></i>@lang('Delete')
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>

                            <div class="col-2"></div>

                            <div class="col-10">
                                <form class="row" action="{{ route('media.store', [ 'lang' => $lang, 'collection' => 'hero' ] ) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-10">
                                        <input
                                            type="file"
                                            name="file"
                                            class="form-control input-solid"
                                        />
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="la la-arrow-alt-circle-up la-5x"></i>@lang('Upload')
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-2">
                                {{ 'Slider Image' }}
                            </div>
                            <div class="col-10 flex items-center gap-8">
                                @foreach($slider as $slide)
                                    <form class="w-40 flex flex-col gap-4" action="{{ route('media.destroy', $slide->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <img src="{{  $slide->getUrl() }}" alt="file.name" class="w-40 h-40 object-contain">
                                        <button type="submit" class="btn btn-sm btn-light-danger">
                                            <i class="la la-trash-o"></i>@lang('Delete')
                                        </button>
                                    </form>
                                @endforeach
                            </div>

                            <div class="col-2"></div>

                            <div class="col-10">
                                <form class="row" action="{{ route('media.store', [ 'lang' => $lang, 'collection' => 'slider' ] ) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-10">
                                        <input
                                            type="file"
                                            name="file"
                                            class="form-control input-solid"
                                        />
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="la la-arrow-alt-circle-up la-5x"></i>@lang('Upload')
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <x-save-or-update-btn
                                :label="__( 'Save Images')"
                                :progress="__('Please wait...')"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
