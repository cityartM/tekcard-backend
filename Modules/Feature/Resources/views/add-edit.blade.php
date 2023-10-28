@extends('layouts.dash')

@section('page-title', __('app.features'))
@section('page-heading', $edit ? $feature->name : __('app.create_new_feature'))

@section('breadcrumbs')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.roles_features')</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.features')</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">{{ __($edit ? 'app.edit' : 'app.create') }}</li>
    </ul>
@stop

@section('content')
@section('actions')
    <a href="{{ route('features.index') }}" class="btn btn-sm btn-primary">
        <i class="ki-duotone ki-black-left-line fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
        @lang('app.back')
    </a>
@endsection
@include('partials.messages')

@if ($edit)
    {!! Form::open(['route' => ['features.update', $feature], 'method' => 'PUT', 'id' => 'feature-form']) !!}
@else
    {!! Form::open(['route' => 'features.store', 'id' => 'feature-form']) !!}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('app.feature_details')"
                :information="__('app.general_feature_information')"
                col="3"
            />
            <div class="col-md-9">
                <x-input-field
                    :title="__('app.name')"
                    :placeholder="__('app.plan_name')"
                    name="name"
                    type="text"
                    col="12"
                    class="mb-2 mb-10"
                    required
                    :model="$edit ? $feature : null"
                />
                <x-languages-tab>
                    @foreach(\App\Helper\Helper::getLocalesOrder() as $locale => $value)
                        <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="language_{{$locale}}" role="tabpanel" aria-labelledby="language_{{$locale}}">
                            <div class="row">
                                <x-fields.text-field
                                    :title="__('app.display_name')"
                                    :placeholder="__('app.display_name')"
                                    name="display_name"
                                    col="6"
                                    type="text"
                                    required
                                    class="mt-5"
                                    :index="$locale"
                                    :locale="$locale"
                                    :model=" $edit ? $feature : null "
                                />
                            </div>
                        </div>
                    @endforeach
                </x-languages-tab>
            </div>
        </div>

        <div class="col-md-12 mt-2">
            <x-save-or-update-btn
            :label="__($edit ?  'app.update_feature' : 'app.save_feature')"
            :progress="__('app.please_wait')"
            />
        </div>
    </div>
</div>



@stop

@section('scripts')
    @if ($edit)
        {!! JsValidator::formRequest('App\Http\Requests\Permission\UpdatePermissionRequest', '#feature-form') !!}
    @else
        {!! JsValidator::formRequest('App\Http\Requests\Permission\CreatePermissionRequest', '#feature-form') !!}
    @endif
@stop
