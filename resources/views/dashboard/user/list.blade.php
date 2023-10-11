@extends('layouts.dash')

@section('page-title', __('app.users'))
@section('page-heading', __('app.users'))

@section('breadcrumbs')
<!--begin::Breadcrumb-->
<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-dark">@lang('app.users_list')</li>
    <!--end::Item-->
</ul>
<!--end::Breadcrumb-->
@stop

@section('content')

@include('partials.messages')
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">

                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    {{ html()->form('GET')->id('users-form')->open() }}
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
													</svg>
												</span>
                        <!--end::Svg Icon-->
                        <input type="text"
                               name="search"
                               data-kt-user-table-filter="search"
                               value="{{ Request::get('search') }}"
                               class="form-control form-control-solid w-275px ps-14 me-3"
                               placeholder="Search user"
                        >
                        <span class="input-group-append ">
                                @if (Request::has('search') && Request::get('search') != '')
                                <a href="{{ route('users.index') }}"
                                   class="btn btn-danger align-items-center "
                                   role="button">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                        </span>
                    </div>
                    <!--end::Search-->

                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                        <!--begin::Filter-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"></path>
													</svg>
												</span>
                            <!--end::Svg Icon-->
                            @lang('app.filter')
                        </button>
                        <!--begin::Menu 1-->

                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">@lang('app.filter_options')</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->
                            <!--begin::Content-->
                            <div class="px-7 py-5" data-kt-user-table-filter="form">
                                <!--begin::Input group-->
                                {!!
                                    Form::select(
                                        'status',
                                        $statuses,
                                        Request::get('status'),
                                        ['id' => 'status',
                                        'class' => 'form-select form-select-solid fw-bolder select2-hidden-accessible mb-10',
                                        'data-kt-select2'=> 'true',
                                        'data-placeholder'=>"Select option",
                                        'data-allow-clear'=>'true',
                                        'data-kt-user-table-filter'=>"role",
                                        'data-hide-search'=>'true',
                                        'data-select2-id'=>"select2-data-10-elgd",
                                        'tabindex'=>'-1',
                                        'aria-hidden'=>'true'
                                        ]
                                    )
                                !!}
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    @if (Request::has('status') && Request::get('status') != '')
                                        <a href="{{ route('users.index') }}"
                                           class="btn btn-danger fw-bold px-6 me-2"
                                           data-kt-menu-dismiss="true"
                                           data-kt-user-table-filter="reset"
                                           role="button">
                                            @lang('app.reset')
                                        </a>
                                    @endif
                                    <button type="submit"
                                            class="btn btn-primary fw-bold px-6"
                                            data-kt-menu-dismiss="true"
                                            data-kt-user-table-filter="filter">
                                        @lang('app.apply')
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Content-->
                        </div>

                        <!--end::Menu 1-->
                        <!--end::Filter-->
                        <!--begin::Add user-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
													</svg>
												</span>
                            <!--end::Svg Icon-->
                            @lang('app.add_user')
                        </button>
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>@lang('app.selected')</div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">@lang('app.delete_selected')</button>
                    </div> 
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->
                {{ html()->form('GET')->close() }}
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive"><table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.25px;">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1">
                                    </div>
                                </th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 240.512px;">User</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 134.712px;">Role</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Last login: activate to sort column ascending" style="width: 134.712px;">Last login</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Two-step: activate to sort column ascending" style="width: 134.712px;">Two-step</th>
                                <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 106.5px;">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            @if (count($users))
                                @foreach ($users as $user)
                                    @include('dashboard.user.partials.row')
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7"><em>@lang('app.no_data_found')</em></td>
                                </tr>
                            @endif
                               <!--end::Table row-->
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>

                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
            <!--end::Card-->
        </div>


{!! $users->render() !!}


@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            //$("#users-form").submit();
        });
    </script>
    <script>
        /* Format Money Function */
        Number.prototype.formatMoney = function(places, symbol, thousand, decimal) {
            places = !isNaN(places = Math.abs(places)) ? places : 2;
            symbol = symbol !== undefined ? symbol : "$";
            thousand = thousand || ",";
            decimal = decimal || ".";
            var number = this,
                negative = number < 0 ? "-" : "",
                i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
                j = (j = i.length) > 3 ? j % 3 : 0;
            return symbol + negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "");
        };
        function floatToStr(price){
            return price.toString().indexOf(' ') === -1 ? price._tofront(1) : price.toString();
        }
        /*Modal Init*/
        $( document ).ready(function() {
            "use strict";
            if( $('#transactionModal').length > 0 ){

                $('#transactionModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var recipient = button.data('id') // Extract info from data-* attributes
                    var recipient1 = button.data('price') // Extract info from data-* attributes
                    recipient1 = "$"+floatToStr(recipient1.formatMoney(2," ",",", "."));
                    var modal = $(this)
                    modal.find('#recipient-id').val(recipient)
                    modal.find('#recipient-price').text(recipient1)

                });
            }


        });
    </script>

    <script>
        $("#confirm").click(function () {
            $("#transaction-form").submit();
        });
    </script>


    <script >
        $(function () {
            $("#dateTransaction").datepicker({
                autoclose: true,
                todayHighlight: true,
                clearBtn: true,
                todayBtn:'true',
                format: 'yyyy-mm-dd',
                startDate: '-1d',
                orientation: 'bottom',
            }).datepicker('update', new Date());
        });

        $("#dateTransaction").keyup(function(e){
            if(e.keyCode ==8 || e.keyCode == 46) {
                $("#dateTransaction").datepicker('update', "");
            }
        });

    </script>
@stop
