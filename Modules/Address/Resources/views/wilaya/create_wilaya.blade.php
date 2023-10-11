@extends('address::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {!! Form::open(['route' => 'address.store', 'method' => 'POST', 'id' => 'create-form']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>@lang('Create willaya')</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <x-languages-tab>
                                                @foreach(\App\Helper\Helper::getLocalesOrder() as $locale => $value)
                                                    <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="language_{{$locale}}" role="tabpanel" aria-labelledby="language_{{$locale}}">
                                                        <div class="row">
                                                            <x-fields.text-field
                                                                :title="__('Wilaya Name')"
                                                                name="name"
                                                                col="6"
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
{{--                                        {!! Form::label('display_name['.$locale.']', __('Name '.$key)) !!}--}}
{{--                                        {!! Form::text('name['.$locale.']', null, ['class' => 'form-control', 'required']) !!}--}}
{{--                                    @endforeach--}}

                                    {!! Form::label('country_id', __('Country')) !!}
                                    {!! Form::select('country_id', $countryOptions, 'select country', ['class' => 'form-control', 'required']) !!}

                                    {!! Form::label('code', __('Code')) !!}
                                    {!! Form::text('code', null, ['class' => 'form-control', 'required']) !!}

                                    {!! Form::label('lat', __('Latitude')) !!}
                                    {!! Form::text('lat', null, ['class' => 'form-control', 'required']) !!}

                                    {!! Form::label('lon', __('Longitude')) !!}
                                    {!! Form::text('lon', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('address.index') }}" class="btn btn-outline-secondary mr-1">
                                <i class="fas fa-times"></i> @lang('Cancel')
                            </a>
                            {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
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
