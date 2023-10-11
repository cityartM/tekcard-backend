@extends('address::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {!! Form::open(['route' => ['address.update', $wilaya->id], 'method' => 'PUT', 'id' => 'edit-form']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>@lang('Edit willaya')</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    @csrf
                                    <input type="hidden" name="checked_update" value="wilaya">

                                    {!! Form::label('name['.$locale.']', __('Name '.$locale)) !!}
                                    {!! Form::text('name['.$locale.']', $wilaya->name, ['class' => 'form-control', 'required']) !!}


                                    <label>@lang("Country")</label>
                                    <select name="country_id" class="form-control">
                                        <option value="{{$country->id}}" selected>{{ $country->name }}</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{ $country->name }}</option>
                                        @endforeach

                                    </select>

                                    {!! Form::label('lat', __('Latitude')) !!}
                                    {!! Form::text('lat', $wilaya->lat, ['class' => 'form-control', 'required']) !!}

                                    {!! Form::label('lon', __('Longitude')) !!}
                                    {!! Form::text('lon', $wilaya->lon, ['class' => 'form-control', 'required']) !!}
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
