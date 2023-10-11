@extends('layouts.dash')

@section('page-title', __('إضافــة مستخدم'))
@section('page-heading', __('إضافــة مستخدم جديد'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('users.index') }}">@lang('المستخدميــن')</a>
    </li>
    <li class="breadcrumb-item active">
        @lang('إنشــاء')
    </li>
@stop

@section('content')

@include('partials.messages')

{!! Form::open(['route' => 'users.store', 'files' => true, 'id' => 'user-form']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-right" dir="rtl">
                    <h5 class="card-title">
                        @lang('تفاصيــل المستخدم')
                    </h5>
                    <p class="text-muted font-weight-light">
                        @lang('معلومات عامة عن ملف تعريف المستخدم.')
                    </p>
                </div>
                <div class="col-md-9">
                    @include('dashboard.user.partials.details', ['edit' => false, 'profile' => false])
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-right" dir="rtl">
                    <h5 class="card-title">
                        @lang('فاصيل تسجيل الدخول')
                    </h5>
                    <p class="text-muted font-weight-light">
                        @lang('التفاصيل المستخدمة للمصادقة مع التطبيق.')
                    </p>
                </div>
                <div class="col-md-9 text-right" dir="rtl">
                    @include('dashboard.user.partials.auth', ['edit' => false])
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" style="width: 128px">
                @lang('إنشــاء مستخدم')
            </button>
        </div>
    </div>
{!! Form::close() !!}

<br>
@stop

@section('scripts')
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('App\Http\Requests\User\CreateUserRequest', '#user-form') !!}
@stop
