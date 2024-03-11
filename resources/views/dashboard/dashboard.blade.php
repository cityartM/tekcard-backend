@extends('layouts.dash')

@section('page-title', __('Dashboard'))
@section('page-heading', __('Dashboard'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('Dashboard')
    </li>
@stop

@section('content')
<div class="row g-5 g-xl-8 px-4 mb-2">
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 20-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100 mb-5 mb-xl-10" style="background: linear-gradient(180deg, #9c27b0 50%, #FFC107 100%)  ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ App\Models\User::query()->count() }}</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <span class="text-white opacity-75 pt-5 fw-semibold fs-6">@lang('app.users')</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 20-->
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 20-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100 mb-5 mb-xl-10" style="background: linear-gradient(180deg, #9c27b0 50%, #FFC107 100%) ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ Modules\Company\Models\Company::query()->count() }}</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <span class="text-white opacity-75 pt-5 fw-semibold fs-6">@lang('app.companies')</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 20-->
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 20-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100 mb-5 mb-xl-10" style="background: linear-gradient(180deg, #9c27b0 50%, #FFC107 100%)  ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ Modules\Card\Models\Card::query()->count() }}</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <span class="text-white opacity-75 pt-5 fw-semibold fs-6">@lang('app.cards')</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 20-->
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 20-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100 mb-5 mb-xl-10" style="background: linear-gradient(180deg, #9c27b0 50%, #FFC107 100%) ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ Modules\Blog\Models\Blog::query()->count() }}</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <span class="text-white opacity-75 pt-5 fw-semibold fs-6">@lang('app.blogs')</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 20-->
        </div>
    </div>
    <div class="row g-5 g-xl-8 px-4 mb-2">
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 20-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100 mb-5 mb-xl-10" style="background: linear-gradient(180deg, #9c27b0 50%, #FFC107 100%)  ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ Modules\ContactUser\Models\Group::query()->count() }}</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <span class="text-white opacity-75 pt-5 fw-semibold fs-6">@lang('app.groups')</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                
            </div>
            <!--end::Card widget 20-->
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 20-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100 mb-5 mb-xl-10" style="background: linear-gradient(180deg, #9c27b0 50%, #FFC107 100%) ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ Modules\Subscription\Models\Subscription::query()->count() }}</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <span class="text-white opacity-75 pt-5 fw-semibold fs-6">@lang('app.email_subscription')</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 20-->
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 20-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100 mb-5 mb-xl-10" style="background: linear-gradient(180deg, #9c27b0 50%, #FFC107 100%) ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ Modules\FeedBack\Models\FeedBack::query()->count() }}</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <span class="text-white opacity-75 pt-5 fw-semibold fs-6">@lang('app.feedback')</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 20-->
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 20-->
            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100 mb-5 mb-xl-10" style="background: linear-gradient(180deg, #9c27b0 50%, #FFC107 100%) ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ Modules\Plan\Models\Plan::query()->count() }}</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <span class="text-white opacity-75 pt-5 fw-semibold fs-6">@lang('app.Plans')</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 20-->
        </div>
    </div>
@endsection
