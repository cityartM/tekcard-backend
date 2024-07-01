@extends('address::layouts.master')

@section('content')
    @section('actions')
        <a href="{{ route('country.index') }}" class="btn btn-sm btn-primary">
            <i class="ki-duotone ki-black-left-line fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            @lang('app.back')
        </a>
    @endsection
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {!! Form::open(['route' => ['country.update', $country->id], 'method' => 'PATCH', 'id' => 'edit-form']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>@lang('app.edit_country')</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    @csrf
                                    <input type="hidden" name="checked_update" value="country">
                                    <x-languages-tab>
                                        @foreach(\App\Helper\Helper::getLocalesOrder() as $locale => $value)
                                            <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="language_{{$locale}}" role="tabpanel" aria-labelledby="language_{{$locale}}">
                                                <div class="row">
                                                    <x-fields.text-field
                                                        :title="__('app.name')"
                                                        :placeholder="__('app.name')"
                                                        name="name"
                                                        col="12"
                                                        type="text"
                                                        required
                                                        class="mt-0"
                                                        :index="$locale"
                                                        :locale="$locale"
                                                        :model=" $country"
                                                    />
                                                </div>
                                            </div>
                                        @endforeach
                                    </x-languages-tab>
                                    <div class="form-check form-switch form-check-custom form-check-solid mb-5 mt-5">
                                        <input class="form-check-input w-30px h-20px me-3 " type="checkbox" value ="1" {{ $country->display?'checked':'' }} name="display" />
                                        <label class="d-flex align-items-center fs-5 fw-bold">@lang('app.display')</label>
                                    </div>

                                    <x-input-field
                                        :title="__('app.delivery_price')"
                                        name="delivery_price"
                                        type="text"
                                        col="12"
                                        class="mb-5 mt-5"
                                        :model="$country"
                                    />

                                    {{--<x-select-field
                                        :title="__('app.currency')"
                                        name="currency_code"
                                        col="12"
                                        class="mb-5"
                                        required
                                        :data="collect($currencies)"
                                        :model="$country"
                                        :isselect2="true"
                                    />
                                --}}
                            {!! Form::label('calling_code', __('app.phone_code'), ['class' => 'd-flex align-items-center fs-5 fw-bold']) !!}
                            {!! Form::text('calling_code', $country->calling_code, ['class' => 'form-control mt-2']) !!}

                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="card-footer">
                <div class="row">
                <div class="col-md-12 text-right">
                {!! Form::submit(__('app.save'), ['class' => 'btn btn-primary']) !!}
                </div>
                </div>
                </div>
                {!! Form::close() !!}

</div>
</div>
</div>
@endsection
@section('scripts')
{{--    {!! JsValidator::formRequest('Modules\Categories\Http\Requests\CategoryRequest', '#create-form') !!}--}}
@endsection
