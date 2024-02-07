@extends('layouts.dash')

@section('page-title', __('app.shipping'))
@section('page-heading', $edit ? $shipping->id : __('app.create_new_shipping'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="{{ route('shippings.index') }}">@lang('app.shipping')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('shippings.update', $shipping))->class('form w-100')->id('shipping-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('shippings.store'))->class('form w-100')->id('shipping-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('app.shipping_phrases_details')"
                :information="__('app.a_general_shipping_phrases_information')"
                col="3"
            />
              <div class="col-md-9">

              <x-select-field
                    :title="__('app.country')"
                    name="country_id"
                    col="12"
                    class="mb-2"
                    required
                    :data="collect(Modules\Address\Models\Country::pluck('name','id'))"
                    :model="$edit ? $shipping : null "
                    :isselect2="true"
                    
                />

              <x-input-field
                    :title="__('app.state')"
                    name="state"
                    col="12"
                    type="text"
                    required
                    class="mt-5 mb-5"
                    :model=" $edit ? $shipping : null "
                    />
              <x-input-field
                    :title="__('app.zip_code')"
                    name="zip_code"
                    col="12"
                    type="text"
                    required
                    class="mt-5 mb-5"
                    :model=" $edit ? $shipping : null "
                    />

                <x-input-field
                    :title="__('app.address')"
                    name="address"
                    col="12"
                    type="text"
                    required
                    class="mt-5 mb-5"
                    :model=" $edit ? $shipping : null "
                    />

                            

                </div>

            </div>

        </div>
        <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label="__($edit ? 'app.add' : 'app.update')"
                :progress="__('Please wait...')"
            />
        </div>
    </div>


</div>



@stop

@section('scripts')
    @if ($edit)

    @else

    @endif

    <script>

    </script>
@stop
