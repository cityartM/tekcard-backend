@extends('layouts.dash')

@section('page-title', __('app.card'))
@section('page-heading', $edit ? $card->id : __('app.create_new_card'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="{{ route('cards.index') }}">@lang('app.card')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('cards.update', $card))->class('form w-100')->id('cards-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('cards.store'))->class('form w-100')->id('card-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('app.card_phrases_details')"
                :information="__('app.a_general_card_phrases_information')"
                col="3"
            />
              <div class="col-md-9">
              <x-input-field
                                    :title="__('app.name')"
                                    name="name"
                                    col="6"
                                    type="text"
                                    required
                                    class="mt-5"
                                    :model=" $edit ? $card : null "
                                />
                                <x-input-field
                                    :title="__('app.full_name')"
                                    name="full_name"
                                    col="6"
                                    type="text"
                                    required
                                    class="mt-5"
                                    :model=" $edit ? $card : null "
                                />
                                <x-input-field
                                    :title="__('app.company_name')"
                                    name="company_name"
                                    col="6"
                                    type="text"
                                    required
                                    class="mt-5"
                                    :model=" $edit ? $card : null "
                                />
                                <x-input-field
                                    :title="__('app.job_title')"
                                    name="job_title"
                                    col="6"
                                    type="text"
                                    required
                                    class="mt-5"
                                    :model=" $edit ? $card : null "
                                />

              <x-select-field
                    :title="__('app.background_id')"
                    name="background_id" 
                    col="12"
                    class="mb-2"
                    required
                    :data="collect($backgrounds->pluck('id', 'id')->toArray())"
                    :model="$edit ? $card : null"
                    :isselect2="true"
                />



                    <x-input-field
                    :title="__('app.color')"
                    name="color"
                    type="color"
                    col="2"
                    class="mb-2 mt-5"
                    required
                    :model=" $edit ? $card : null "
                />

                <x-input-field
                    :title="__('app.image_upload')"
                    type="file"
                    name="avatar"
                    accept="avatar/*"
                    col="12"
                    row="3"
                    class="mb-2 mt-5"
                    :model=" $edit ? $card : null "
                />

                </div>

            </div>
            <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label="__($edit ? 'app.card' : 'app.card')"
                :progress="__('Please wait...')"
            />
        </div>
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
