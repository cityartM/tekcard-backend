@extends('layouts.dash')

@section('page-title', __('app.update_user'))
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
        <li class="breadcrumb-item text-muted">{{ __('app.update_user') }}</li>
    </ul>
@stop
@section('style')
    <style>
        .image-input-placeholder {
            background-image: url('assets/img/profile.png');
        }

        [data-bs-theme="dark"] .image-input-placeholder {
            background-image: url('assets/img/profile.png');
        }
    </style>
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

@include('partials.messages')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">

                <div class="flex-lg-row-fluid">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_details_tab" aria-selected="true" role="tab">
                                @lang('app.User Details')
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_login_detail_tab" data-kt-initialized="1" aria-selected="false" tabindex="-1" role="tab">
                                @lang('app.Login Details')
                            </a>
                        </li>
                    </ul>
                    <!--end:::Tabs-->

                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_user_details_tab" role="tabpanel">
                            <form action="{{ route('users.update.details', $user) }}" method="POST" id="details-form">
                                @csrf
                                @method('PUT')
                                @include('dashboard.user.partials.details', ['profile' => false])
                            </form>
                        </div>


                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_user_login_detail_tab" role="tabpanel">
                            <form action="{{ route('users.update.login-details', $user) }}"
                                  method="POST"
                                  id="login-details-form">
                                @csrf
                                @method('PUT')
                                @include('dashboard.user.partials.auth')
                            </form>
                        </div>

                    </div>
                    <!--end:::Tab content-->
                </div>

            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.update.avatar', $user->id) }}"
                      method="POST"
                      id="avatar-form"
                      enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.user.partials.avatar')
                </form>
            </div>
        </div>
    </div>
</div>


@stop

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\User\UpdateDetailsRequest', '#details-form') !!}
    {!! JsValidator::formRequest('App\Http\Requests\User\UpdateLoginDetailsRequest', '#login-details-form') !!}
@stop
