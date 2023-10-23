@extends('layouts.dash')

@section('page-title', __('app.plans'))
@section('page-heading', $edit ? $plan->name : __('app.create_new_plan'))
@section('breadcrumbs')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('app.plans_features')</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted text-hover-primary">@lang('app.plans')</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">{{ __($edit ? 'app.edit' : 'app.create') }}</li>
    </ul>
@stop

@section('content')

@section('actions')
    <a href="{{ route('plans.index') }}" class="btn btn-sm btn-primary">
        <i class="ki-duotone ki-black-left-line fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
        @lang('app.back')
    </a>
@endsection

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('plans.update', $plan))->class('form w-100')->id('plan-form')->open() }}
@else
    {{ html()->form('POST',route('plans.store'))->class('form w-100')->id('plan-form')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('app.plan_details')"
                :information="__('app.general_plan_information')"
                col="3"
            />
            <div class="col-md-9">
                <x-select-field
                    :title="__('Type')"
                    :placeholder="__('Type')"
                    name="type"
                    :isselect2="true"
                    col="12"
                    class="mb-2 mb-5"
                    required
                    :data="collect(Modules\Plan\Support\Enum\PlanType::lists())"
                    :model=" $edit ? $plan : null "
                />
                <x-input-field
                    :title="__('app.name')"
                    :placeholder="__('app.plan_name')"
                    name="name"
                    type="text"
                    col="12"
                    class="mb-2 mb-10"
                    required
                    :model="$edit ? $plan : null"
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
                                    :model=" $edit ? $plan : null "
                                />
                            </div>
                        </div>
                    @endforeach
                </x-languages-tab>
                <div class="row mt-5">
                    <x-input-field
                        :title="__('app.nbr_user')"
                        :placeholder="__('app.nbr_user')"
                        name="nbr_user"
                        type="text"
                        col="6"
                        class="mb-2 mb-10"
                        required
                        :model="$edit ? $plan : null"
                    />
                    <x-input-field
                        :title="__('app.nbr_card_user')"
                        :placeholder="__('app.nbr_card_user')"
                        name="nbr_card_user"
                        type="text"
                        col="6"
                        class="mb-2 mb-10"
                        required
                        :model="$edit ? $plan : null"
                    />
                </div>
                <div class="row">
                <x-input-switch
                    :title="__('app.has_dashboard')"
                    name="has_dashboard"
                    col="3"
                    :status=" $edit && $plan->has_dashboard === true ? 'true' : 'false'"
                />
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label="__($edit ?  'app.update_plan' : 'app.save_plan')"
                :progress="__('app.please_wait')"
            />
        </div>
    </div>


</div>



@stop

@section('scripts')
    @if ($edit)
        {!! JsValidator::formRequest('Modules\Plan\Http\Requests\UpdatePlanRequest', '#plan-form') !!}
    @else
        {!! JsValidator::formRequest('Modules\Plan\Http\Requests\CreatePlanRequest', '#plan-form') !!}
    @endif
@stop
