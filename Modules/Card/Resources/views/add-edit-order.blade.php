@extends('layouts.dash')

@section('page-title', __('app.card_order'))
@section('page-heading', $edit ? $cardOrders->id : __('app.create_new_card_order'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="{{ route('cardOrders.index') }}">@lang('app.card_order')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('cardOrders.update', $cardOrders))->class('form w-100')->id('cardOrders-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('cardOrders.store'))->class('form w-100')->id('cardOrders-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('app.card_order_phrases_details')"
                :information="__('app.a_general_card_order_phrases_information')"
                col="3"
            />
              <div class="col-md-9">
              

              <label class="form-check-label d-flex align-items-center fs-5 fw-bold mb-2">
        <input type="checkbox" class="form-check-input" id="is_checked" name="is_checked" {{ $edit && $order->is_checked ? 'checked' : '' }}>
        @lang('app.select_all_cards')
    </label>
</br>
              <x-select-field
                    :title="__('app.card')"
                    name="card_ids"
                    id="card_ids"
                    col="12"
                    class="mb-2"
                    required
                    :data="collect($userCards->pluck('name', 'id')->toArray())"
                    :model="$edit ? $order : null "
                    :multidata="$edit ? $order : null"
                    :isselect2="true"
                    multi=true
                />

              

              <x-select-field
                    :title="__('app.country')"
                    name="country_id" 
                    col="12"
                    class="mb-2"
                    required
                    :data="collect(Modules\Address\Models\Country::pluck('name','id'))"
                    :model="$edit ? $order : null"
                    :isselect2="true"
                />
                <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="display_name">@lang('app.state')</label>
                        <input type="string"
                            class="form-control input-solid mb-2"
                            id="state"
                            name="state"
                            placeholder="@lang('app.state')"
                            value="{{ $edit ? $order->state : null }}">
                 <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="display_name">@lang('app.zip_code')</label>
                        <input type="string"
                            class="form-control input-solid mb-2"
                            id="zip_code"
                            name="zip_code"
                            placeholder="@lang('app.zip_code')"
                            value="{{ $edit ? $order->zip_code : null }}">
                 <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="display_name">@lang('app.address')</label>
                        <input type="string"
                            class="form-control input-solid mb-2"
                            id="address"
                            name="address"
                            placeholder="@lang('app.address')"
                            value="{{ $edit ? $order->address : null }}">




                <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="display_name">@lang('app.quantity')</label>
                        <input type="string"
                            class="form-control input-solid mb-2"
                            id="quantity"
                            name="quantity"
                            placeholder="@lang('app.quantity')"
                            value="{{ $edit ? $order->quantity : null }}">


                    <x-input-field
                    :title="__('app.color')"
                    name="color"
                    type="color"
                    col="2"
                    class="mb-2 mt-5"
                    required
                    :model=" $edit ? $order : null "
                />

                </div>

            </div>

        </div>
        <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label="__($edit ? 'app.cardOrders' : 'app.cardOrders')"
                :progress="__('Please wait...')"
            />
        </div>
    </div>


</div>



@stop

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectAllCardsCheckbox = document.getElementById('is_checked');
            const cardIdsField = document.getElementById('card_ids');

            // Hide or show card_ids based on the initial value of is_checked
            if (selectAllCardsCheckbox.checked) {
                cardIdsField.style.display = 'none';
            } else {
                cardIdsField.style.display = 'block';
            }

            // Add event listener to select_all_cards checkbox
            selectAllCardsCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    cardIdsField.style.display = 'none';
                } else {
                    cardIdsField.style.display = 'block';
                }
            });
        });
    </script>

    
@stop