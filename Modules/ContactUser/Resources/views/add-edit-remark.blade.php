@extends('layouts.dash')

@section('page-title', __('app.remark'))
@section('page-heading', $edit ? $remark->id : __('app.Create New remark'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="{{ route('remarks.index') }}">@lang('app.remark')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('remarks.update', $remark))->class('form w-100')->id('remark-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('remarks.store'))->class('form w-100')->id('remark-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('remark Phrases Details')"
                :information="__('A general remark Phrases information.')"
                col="3"
            />
              <div class="col-md-9">


                    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="display_name">@lang('app.title')</label>
                        <input type="text"
                            class="form-control input-solid mb-2"
                            id="title"
                            name="title"
                            placeholder="@lang('app.title')"
                            value="{{ $edit ? $remark->title : null }}">


                            <x-input-field
                    :title="__('Color')"
                    name="color"
                    type="color"
                    col="2"
                    class="mb-2 mt-5"
                    required
                    :model=" $edit ? $remark : null "
                />

                </div>

            </div>

        </div>
        <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label="__($edit ? 'app.remark' : 'app.remark')"
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
