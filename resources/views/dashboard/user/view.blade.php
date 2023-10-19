@extends('layouts.dash')

@section('page-title', $user->present()->nameOrEmail)
@section('page-heading', $user->present()->nameOrEmail)

@section('breadcrumbs')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.users')</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.user')</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">{{ __('app.profile') }}</li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">{{ $user->present()->nameOrEmail }}</li>
    </ul>
@stop

@section('content')
    @section('actions')
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">
            <i class="ki-duotone ki-black-left-line fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            @lang('app.back')
        </a>
    @endsection
<div class="row">
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex flex-center flex-column py-5">
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{ $user->present()->avatar }}" alt="image">
                                </div>
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
                                    {{ $user->present()->name }}
                                </a>
                                <div class="mb-9">
                                    <div class="badge badge-lg badge-light-primary d-inline">
                                        {{ $user->role->display_name }}
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap flex-center">
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                        <div class="fs-4 fw-bold text-gray-700">
                                            <span class="w-75px">243</span>
                                            <i class="ki-duotone ki-arrow-up fs-3 text-success"><span class="path1"></span><span class="path2"></span></i>            </div>
                                        <div class="fw-semibold text-muted">@lang('app.group')</div>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">
                                    @lang('app.details')
                                    <span class="ms-2 rotate-180">
                                        <i class="ki-duotone ki-down fs-3"></i>
                                    </span>
                                </div>

                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-original-title="Edit customer details" data-kt-initialized="1">
                                   <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-light-primary">
                                        @lang('app.edit')
                                   </a>
                                </span>
                            </div>

                            <div class="separator"></div>

                            <div id="kt_user_view_details" class="collapse">
                                <div class="pb-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">@lang('app.account_id')</div>
                                    <div class="text-gray-600"># {{$user->id}}</div>

                                    <div class="fw-bold mt-5">@lang('app.email_user')</div>
                                    <div class="text-gray-600"><a href="#" class="text-gray-600 text-hover-primary">{{$user->email}}</a></div>

                                    <div class="fw-bold mt-5">@lang('app.address_user')</div>
                                    <div class="text-gray-600">{{$user->address}}</div>

                                    <div class="fw-bold mt-5">@lang('app.user_lang')</div>
                                    <div class="text-gray-600">@lang('app.'.$user->lang)</div>

                                    <div class="fw-bold mt-5">@lang('app.created_at')</div>
                                    <div class="text-gray-600">{{$user->present()->createdAt}}</div>

                                    <div class="fw-bold mt-5">@lang('app.last_login')</div>
                                    <div class="text-gray-600">{{$user->present()->lastLogin}}</div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8" role="tablist">
                        <!--begin:::Tab item-->
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_app_link_tab" aria-selected="true" role="tab">
                                @lang('app.link')
                            </a>
                        </li>
                        <!--end:::Tab item-->

                    </ul>
                    <!--end:::Tabs-->

                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_user_app_link_tab" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card card-flush mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header mt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">User's Schedule</h2>

                                        <div class="fs-6 fw-semibold text-muted">2 upcoming meetings</div>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body p-9 pt-4">
                                    <!--begin::Input group-->
                                    <div class="form-floating form-control-solid-bg rounded">
                                        <select class="form-select form-select-transparent" id="kt_docs_select2_floating_labels_2" data-allow-clear="true">
                                            <option></option>
                                            @foreach(\App\Support\Enum\SocialMedia::lists() as $key => $social)
                                                <option value="{{$key}}"
                                                        data-kt-select2-social="{{url('assets/media/svg/social-logos/'.$social.'.svg')}}">
                                                    {{$social}}
                                                </option>

                                            @endforeach
                                        </select>
                                        <label for="floatingInputValue">Coin Name</label>
                                    </div>
                                    <!--end::Input group-->
                                </div>

                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
        </div>

    </div>
</div>
@stop

@section('scripts')
    <script>
       var optionFormat = function(item) {
           if ( !item.id ) {
               return item.text;
           }

           var span = document.createElement('span');
           var svgIcon = item.element.getAttribute('data-kt-select2-social');
           var template = '';
           template += '<img src="' + svgIcon  + '" class="rounded-circle h-20px me-2" alt="image"/>';
           //template += '<i class="ki-duotone ki-' + iconName + ' fs-2 rounded-circle h-20px me-2"> <span class="path1"></span> <span class="path2"></span> </i>';
           template += item.text;

           span.innerHTML = template;

           return $(span);
       }

       // Init Select2 --- more info: https://select2.org/
       $('#kt_docs_select2_floating_labels_2').select2({
           placeholder: "Select coin",
           minimumResultsForSearch: Infinity,
           templateSelection: optionFormat,
           templateResult: optionFormat
       });
    </script>
@stop
