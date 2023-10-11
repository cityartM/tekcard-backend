@extends('layouts.appDash')

@section('page-title', __('البلدان'))
@section('page-heading', $edit ? $country->name_en : __('إضافة بلد جديد'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('countries.index') }}">@lang('البلدان')</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __($edit ? 'تعديل' : 'إنشـاء') }}
    </li>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {!! Form::open(['route' => ['countries.update', $country],'files' => 'false', 'method' => 'PUT', 'id' => 'country-form']) !!}
@else
    {!! Form::open(['route' => 'countries.store','files' => 'true', 'id' => 'country-form']) !!}
@endif

<div class="card">
    <div class="card-body">
        <div class="row text-right" dir="rtl">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('تفاصيل البلد')
                </h5>
                <p class="text-muted">
                    @lang('المعلومــات العامة عن البلد')
                </p>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="name">@lang('إســم البلد بالعربية *')</label>
                    <input type="text"
                           class="form-control input-solid"
                           id="name_ar"
                           name="name_ar"
                           placeholder="@lang('إســم البلد بالعربية')"
                           value="{{ $edit ? $country->name_ar : old('name_ar') }}">
                </div>

                <div class="form-group">
                    <label for="name">@lang('إســم البلد بالإنجليزي *')</label>
                    <input type="text"
                           class="form-control input-solid"
                           id="name_en"
                           name="name_en"
                           placeholder="@lang('إســم البلد بالإنجليزي')"
                           value="{{ $edit ? $country->name_en : old('name_en') }}">
                </div>

                <div class="form-group">
                    <label for="calling_code">@lang('كود الاتصال')</label>
                    <input type="text"
                           class="form-control input-solid"
                           id="calling_code"
                           name="calling_code"
                           placeholder="@lang('كود الاتصال')"
                           value="{{ $edit ? $country->calling_code : old('calling_code') }}">
                </div>

                <div class="form-group">
                    <label for="currency">@lang('العملة')</label>
                    <input type="text"
                           class="form-control input-solid"
                           id="currency"
                           name="currency"
                           placeholder="@lang('العملة')"
                           value="{{ $edit ? $country->currency : old('currency') }}">
                </div>
                <div class="form-group">
                    <label for="currency_code">@lang('كود العملة')</label>
                    <input type="text"
                           class="form-control input-solid"
                           id="currency_code"
                           name="currency_code"
                           placeholder="@lang('كود العملة')"
                           value="{{ $edit ? $country->currency_code : old('currency_code') }}">
                </div>

            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">
    {{ __($edit ? 'تحديث البلد' : 'إنشاء البلد') }}
</button>

@stop

@section('scripts')
    @if ($edit)
        {!! JsValidator::formRequest('Hoska\Http\Requests\Country\UpdateCountryRequest', '#country-form') !!}
    @else
        {!! JsValidator::formRequest('Hoska\Http\Requests\Country\CreateCountryRequest', '#country-form') !!}
    @endif
@stop
