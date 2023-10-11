@extends('layouts.dash')

@php
$edit =false;
@endphp

@section('page-title', __('translate'))
@section('page-heading', $edit ? $translate->key : __('Create New translate'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="">@lang('translate')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('translate.update', $translate))->class('form w-100')->id('translate-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
// {{ html()->form('POST',route('plan.store'))->class('form w-100')->id('role-form') ->attribute('enctype', 'multipart/form-data')
    ->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('translate Details')"
                :information="__('A general translateinformation.')"
                col="3"
            />
            <div class="col-md-9">

            <div class="col-md-9">
                
                <x-input-field
                    :title="__('key')"
                    name="key"
                    col="12"
                    class="mb-2"
                    type="text"

                    
                />

            </div>
                        
            
        </div>
        <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label=" 'Create key'"
                :progress="__('Please wait...')"
            />
        </div>
    </div>


</div>



@stop

@section('scripts')
    @if ($edit)
        {!! JsValidator::formRequest('App\Http\Requests\Plan\UpdatePlanRequest', '#role-form') !!}
    @else
        {!! JsValidator::formRequest('App\Http\Requests\Role\CreateRoleRequest', '#role-form') !!}
    @endif
@stop
