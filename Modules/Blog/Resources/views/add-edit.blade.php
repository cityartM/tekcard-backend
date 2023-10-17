@extends('layouts.dash')

@section('page-title', __('app.Motivational Phrases'))
@section('page-heading', $edit ? $motivationalPhrase->id : __('app.Create New Motivational Phrases'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="{{ route('motivationalPhrases.index') }}">@lang('app.Motivational Phrases')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('motivationalPhrases.update', $motivationalPhrase))->class('form w-100')->id('motivationalPhrases-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('motivationalPhrases.store'))->class('form w-100')->id('motivationalPhrases-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('Motivational Phrases Details')"
                :information="__('A general Motivational Phrases information.')"
                col="3"
            />
            <div class="col-md-9">
                <x-languages-tab>
                    @foreach(\App\Helper\Helper::getLocalesOrder() as $locale => $value)

                        <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="language_{{$locale}}" role="tabpanel" aria-labelledby="language_{{$locale}}">
                            <div class="row">
                                <x-fields.text-field
                                    :title="__('Title')"
                                    name="title"
                                    col="6"
                                    type="text" 
                                    required
                                    class="mt-5"
                                    :index="$locale"
                                    :locale="$locale"
                                    :model=" $edit ? $motivationalPhrase : null "
                                />
                            </div>
                        </div>
                    @endforeach
                </x-languages-tab>
                <x-input-field
                    :title="__('Color')"
                    name="color"
                    type="color"
                    col="2"
                    class="mb-2 mt-5"
                    required
                    :model=" $edit ? $motivationalPhrase : null "
                />

                <x-input-field
                    :title="__('Image Upload (max:2M)')"
                    type="file"
                    name="image"
                    accept="image/*"
                    col="12"
                    row="3"
                    class="mb-2 mt-5"
                    :model=" $edit ? $motivationalPhrase : null "
                />

            </div>
        </div>
        <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label="__($edit ? 'Update Motivational Phrases' : 'Create Motivational Phrases')"
                :progress="__('Please wait...')"
            />
        </div>
    </div>


</div>



@stop

@section('scripts')
    @if ($edit)
        {!! JsValidator::formRequest('Modules\MotivationalPhrases\Http\Requests\UpdateMotivationalPhrasesRequest', '#motivationalPhrases-form') !!}
    @else
        {!! JsValidator::formRequest('Modules\MotivationalPhrases\Http\Requests\CreateMotivationalPhrasesRequest', '#motivationalPhrases-form') !!}
    @endif

    <script>

    </script>
@stop
