@extends('address::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {!! Form::open(['route' => ['city.update', $city->id], 'method' => 'PUT', 'id' => 'edit-form']) !!}
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
                                    {!! Form::text('name['.$locale.']', $city->name, ['class' => 'form-control', 'required']) !!}


                                    <label>@lang("Country")</label>
                                    <select class="form-control" id="countrySelect" name="country_id" onchange="updateWilayaOptions(this)">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{ $city->wilaya->country_id == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label>@lang("Wilaya")</label>
                                    <select class="form-control" id="wilayaSelect" name="wilaya_id">
                                        @foreach ($wilayas as $wilaya)
                                            <option value="{{ $wilaya->id }}" {{ $city->wilaya_id == $wilaya->id ? 'selected' : '' }}>
                                                {{ $wilaya->name }}
                                            </option>
                                        @endforeach
                                    </select>


                                    {!! Form::label('lat', __('Latitude')) !!}
                                    {!! Form::text('lat', $city->lat, ['class' => 'form-control', 'required']) !!}

                                    {!! Form::label('lon', __('Longitude')) !!}
                                    {!! Form::text('lon', $city->lon, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ route('city.index') }}" class="btn btn-outline-secondary mr-1">
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
    <script>
        function updateWilayaOptions(countrySelect) {
            var selectedCountryId = countrySelect.value;
            var wilayaSelect = document.getElementById('wilayaSelect');

            // Clear existing wilaya options
            while (wilayaSelect.firstChild) {
                wilayaSelect.removeChild(wilayaSelect.firstChild);
            }

            // Add new wilaya options based on the selected country
            @foreach ($wilayas as $wilaya)
            if ('{{ $city->wilaya->country_id }}' === selectedCountryId) {
                var option = document.createElement('option');
                option.value = '{{ $wilaya->id }}';
                option.text = '{{ $wilaya->name }}';
                option.selected = '{{ $city->wilaya_id == $wilaya->id ? true : false }}';
                wilayaSelect.appendChild(option);
            }
            @endforeach
        }
    </script>

{{--    {!! JsValidator::formRequest('Modules\Categories\Http\Requests\CategoryRequest', '#create-form') !!}--}}
@endsection
