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
                {!! Form::open(['route' => 'country.store', 'method' => 'POST', 'id' => 'create-form']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>@lang('app.create_country')</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <x-languages-tab>
                                                @foreach(\App\Helper\Helper::getLocalesOrder() as $locale => $value)
                                                    <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="language_{{$locale}}" role="tabpanel" aria-labelledby="language_{{$locale}}">
                                                        <div class="row">
                                                            <x-fields.text-field
                                                                :title="__('app.country_name')"
                                                                name="name"
                                                                col="12"
                                                                type="text"
                                                                required
                                                                class="mt-5"
                                                                :index="$locale"
                                                                :locale="$locale"
                                                            />
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </x-languages-tab>
                                        </div>
                                        </div>
{{--                                    @foreach(['Ar'=>'ar', 'En'=>'en', 'Fr'=>'fr'] as $key => $locale)--}}
{{--                                        {!! Form::label('name['.$locale.']', __('Name '.$key)) !!}--}}
{{--                                        {!! Form::text('name['.$locale.']', null, ['class' => 'form-control', 'required']) !!}--}}
{{--                                    @endforeach--}}
                                    <div class="form-check form-switch form-check-custom form-check-solid mb-5 mt-5">
                                        <input class="form-check-input w-30px h-20px me-3 " type="checkbox" value ="1" name="display" />
                                        <label class="d-flex align-items-center fs-5 fw-bold">@lang('app.display')</label>
                                    </div>

                                    <x-input-field
                                        :title="__('app.delivery_price')"
                                        name="delivery_price"
                                        type="text"
                                        col="12"
                                        class="mb-5 mt-5"
                                        :model="null"
                                    />

                                    {{--   <x-select-field
                                          :title="__('app.currency')"
                                          name="currency_code"
                                          col="12"
                                          class="mb-5"
                                          required
                                          :data="collect($currencies)"
                                          :model="null"
                                          :isselect2="true"
                                      />
                                --}}
      {!! Form::label('calling_code', __('app.phone_code'), ['class' => 'd-flex align-items-center fs-5 fw-bold']) !!}
      {!! Form::text('calling_code', null, ['class' => 'form-control mt-2']) !!}
  </div>
</div>
</div>
</div>
</div>
<div class="card-footer">
<div class="row">
<div class="col-md-12 text-right">
{!! Form::submit(__('app.save'), ['class' => 'btn btn-sm btn-primary']) !!}
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
