@extends('address::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Add user-->
                        <a href="{{ route('country.create', ['type' => 'country']) }}" class="btn btn-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            @lang('app.add country')
                        </a>
                        <!--end::Add user-->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>@lang('ID')</th>
                                <th>@lang('app.Name')</th>
                                <th>@lang('app.Code')</th>
                                <th>@lang('LAT')</th>
                                <th>@lang('LON')</th>
                                <th>@lang('app.Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Countries as $country)
{{--                                @php--}}
{{--                                    /** @var \Modules\Categories\Models\Category $country */--}}
{{--                                @endphp--}}
                                <tr>
                                    <td class="align-center">{{ $country->id }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->code }}</td>
                                    <td>{{ $country->lat }}</td>
                                    <td>{{ $country->lon }}</td>

                                    <td>
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">@lang('app.Actions')
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('country.edit', $country->id) }}" class="menu-link px-3">@lang('app.Edit')</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" onclick="event.preventDefault();document.getElementById('delete-country-{{$country->id}}').submit();">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                        <form class="hidden" action="{{ route('country.destroy',$country->id) }}" id="delete-country-{{$country->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="checking_id" value="country">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
{{--                                {!! $Countries->links('vendor.pagination.bootstrap-4') !!}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
