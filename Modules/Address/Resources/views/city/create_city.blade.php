@extends('address::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                {!! Form::open(['route' => 'city.store', 'method' => 'POST', 'id' => 'create-form']) !!}
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
                                                                :title="__('City Name')"
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

                                    {!! Form::label('country_id', __('Country')) !!}
                                    {!! Form::select('country_id', $countryNames, null, ['class' => 'form-control', 'required', 'id' => 'countrySelect']) !!}

                                    {!! Form::label('wilaya_id', __('Wilaya')) !!}
                                    {!! Form::select('wilaya_id', [], null, ['class' => 'form-control', 'required', 'id' => 'wilayaSelect']) !!}

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
        var wilayasByCountry = @json($wilayasByCountry);

        var countrySelect = document.getElementById('countrySelect');
        var wilayaSelect = document.getElementById('wilayaSelect');

        countrySelect.addEventListener('change', function () {
            var selectedCountryId = this.value;

            wilayaSelect.innerHTML = '<option value="">Select wilaya</option>';

            var wilayas = wilayasByCountry[selectedCountryId];
            for (var i = 0; i < wilayas.length; i++) {
                var wilaya = wilayas[i];
                wilayaSelect.options.add(new Option(wilaya.name, wilaya.id));
            }
        });

        countrySelect.dispatchEvent(new Event('change'));
    </script>


    {{--    {!! JsValidator::formRequest('Modules\Categories\Http\Requests\CategoryRequest', '#create-form') !!}--}}
@endsection
