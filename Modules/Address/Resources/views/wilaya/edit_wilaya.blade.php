@extends('address::layouts.master')

@section('content')
    @section('actions')
        <a href="{{ route('address.index') }}" class="btn btn-sm btn-primary">
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
                {!! Form::open(['route' => ['address.update', $wilaya->id], 'method' => 'PUT', 'id' => 'edit-form']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>@lang('app.edit_wilaya')</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    @csrf
                                    <input type="hidden" name="checked_update" value="wilaya">

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
                                                        :model=" $wilaya"
                                                    />
                                                </div>
                                            </div>
                                        @endforeach
                                    </x-languages-tab>
                                    <x-select-field
                                        :title="__('app.country')"
                                        name="country_id"
                                        col="12"
                                        class="mb-5 mt-5"
                                        required
                                        :data="collect($countries)"
                                        :model="$wilaya"
                                        :isselect2="true"
                                    />

                                    <x-input-field
                                        :title="__('app.delivery_price')"
                                        name="delivery_price"
                                        type="text"
                                        col="12"
                                        class="mb-5 mt-5"
                                        :model="$wilaya"
                                    />

                                    {!! Form::label('code', __('app.code'), ['class' => 'd-flex align-items-center fs-5 fw-bold']) !!}
                                    {!! Form::text('code',$wilaya->code, ['class' => 'form-control mt-2 mb-5']) !!}

                                    {!! Form::label('lat', __('app.latitude'), ['class' => 'd-flex align-items-center fs-5 fw-bold']) !!}
                                    {!! Form::text('lat', $wilaya->lat, ['class' => 'form-control mt-2']) !!}

                                    {!! Form::label('lon', __('app.longitude'), ['class' => 'd-flex align-items-center fs-5 fw-bold mt-5']) !!}
                                    {!! Form::text('lon', $wilaya->lon, ['class' => 'form-control mt-2']) !!}
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
