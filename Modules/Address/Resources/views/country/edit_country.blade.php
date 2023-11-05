@extends('address::layouts.master')

@section('content')
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
                                <div class="col-md-6">
                                    @csrf
                                    <input type="hidden" name="checked_update" value="country">
                                    {!! Form::label('name['.$locale.']', __('Name '.$locale)) !!}
                                    {!! Form::text('name['.$locale.']', $country->name, ['class' => 'form-control', 'required']) !!}


                                    {!! Form::label('code', __('app.code')) !!}
                                    {!! Form::text('code', $country->code, ['class' => 'form-control', 'required']) !!}

                                    {!! Form::label('lat', __('app.latitude')) !!}
                                    {!! Form::text('lat', $country->lat, ['class' => 'form-control', 'required']) !!}

                                    {!! Form::label('lon', __('app.longitude')) !!}
                                    {!! Form::text('lon', $country->lon, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('country.index') }}" class="btn btn-outline-secondary mr-1">
                                <i class="fas fa-times"></i> @lang('app.cancel')
                            </a>
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
