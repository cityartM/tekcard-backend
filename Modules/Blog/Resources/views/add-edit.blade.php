@extends('layouts.dash')

@section('page-title', __('app.Blog'))
@section('page-heading', $edit ? $blog->id : __('app.Create New Blog'))

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">
                <a href="{{ route('blog.index') }}">@lang('app.blog')</a>
            </li>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <li class="breadcrumb-item text-dark">{{ __($edit ? 'Edit' : 'Create') }}</li>
    </ul>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {{ html()->form('PUT',route('blog.update', $blog))->class('form w-100')->id('blog-form')->attribute('enctype', 'multipart/form-data')->open() }}
@else
    {{ html()->form('POST',route('blog.store'))->class('form w-100')->id('blog-form')->attribute('enctype', 'multipart/form-data')->open() }}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <x-card-left
                :title="__('blog Phrases Details')"
                :information="__('A general blog Phrases information.')"
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
                                    :model=" $edit ? $blog : null "
                                />
                            </div>
                            <div class="row">
                                <x-fields.text-field
                                    :title="__('content')"
                                    name="content"
                                    col="8"
                                    type="string" 
                                    required
                                    class="mt-5"
                                    :index="$locale"
                                    :locale="$locale"
                                    :model=" $edit ? $blog : null "
                                />
                            </div>
                        </div>
                    @endforeach
                </x-languages-tab>

                <div class="form-group">
                   <label for="type">type</label>
                    <select id="type" name="type" class="form-control">
                        @foreach (App\Support\Enum\BlogCategories::lists() as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                   <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        @foreach (App\Support\Enum\Status::lists() as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>


                <x-input-field
                    :title="__('Image Upload (max:2M)')"
                    type="file"
                    name="tumail"
                    accept="tumail/*"
                    col="12"
                    row="3"
                    class="mb-2 mt-5"
                    :model=" $edit ? $blog : null "
                />

                <div class="form-group">
                    <label for="gallery">Upload Images</label>
                    <input type="file" id="gallery" name="gallery[]" class="form-control" multiple>
                </div>

            </div>
            
        </div>
        <div class="col-md-12 mt-2">
           <x-save-or-update-btn
                :label="__($edit ? 'Update blog' : 'Create blog')"
                :progress="__('Please wait...')"
            />
        </div>
    </div>


</div>



@stop

@section('scripts')
    @if ($edit)
        
    @else
      
    @endif

    <script>

    </script>
@stop
