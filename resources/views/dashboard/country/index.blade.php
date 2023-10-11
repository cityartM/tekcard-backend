@extends('layouts.appDash')

@section('page-title', __('البلدان'))
@section('page-heading', __('البلدان'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('البلدان')
    </li>
@stop

@section('content')

    @include('partials.messages')

    <div class="card">
        <div class="card-body ">

            <form action="" method="GET" id="users-form" class="pb-2 mb-3 border-bottom-light">
                <div class="row my-3 flex-md-row flex-column-reverse text-right" dir="rtl">
                    <div class="col-md-4 mt-md-0 mt-2">
                        <div class="input-group custom-search-form">
                            <input type="text"
                                   class="form-control input-solid"
                                   name="search"
                                   value="{{ Request::get('search') }}"
                                   placeholder="@lang('بحــث في البلدان..')">

                            <span class="input-group-append">
                                @if (Request::has('search') && Request::get('search') != '')
                                    <a href="{{ route('countries.index') }}"
                                       class="btn btn-light d-flex align-items-center text-muted"
                                       role="button">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                                <button class="btn btn-light" type="submit" id="search-users-btn">
                                    <i class="fas fa-search text-muted"></i>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-8 mb-3 border-bottom-light">
                        <div class="col-lg-12">
                            <div class="float-left">
                                <a href="{{ route('countries.create') }}" class="btn btn-primary btn-rounded">
                                    <i class="fas fa-plus mr-2"></i>
                                    @lang('إضافة بلد')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <div class="table-responsive" id="users-table-wrapper">
                <table class="table table-striped table-borderless">
                    <thead>
                    <tr class="text-right">
                        <th class="min-width-150">@lang('إســم البلد بالإنجليزية')</th>
                        <th class="min-width-150">@lang('إســم البلد بالعربية')</th>
                        <th class="min-width-150">@lang('كود الاتصال')</th>
                        <th class="min-width-150">@lang('العملة')</th>
                        <th class="min-width-150">@lang('كود العملة')</th>
                        <th class="text-center">@lang('الإجراءات')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($countries))
                        @foreach ($countries as $country)
                            <tr class="text-right">
                                <td class="p-4">{{ $country->name_en }}</td>
                                <td class="p-4">{{ $country->name_ar }}</td>
                                <td class="p-4">{{ $country->calling_code }}</td>
                                <td class="p-4">{{ $country->currency }}</td>
                                <td class="p-4">{{ $country->currency_code }}</td>
                                <td class="text-center p-4">
                                    <a href="{{ route('countries.edit', $country) }}" class="btn btn-icon"
                                       title="@lang('تحديث')" data-toggle="tooltip" data-placement="top">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                        <a href="{{ route('countries.destroy', $country) }}" class="btn btn-icon"
                                           title="@lang('حذف')"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           data-method="DELETE"
                                           data-confirm-title="@lang('من فضلك أكد')"
                                           data-confirm-text="@lang('هل تريد حقا حذف هذه الشركــة؟')"
                                           data-confirm-delete="@lang('نعــم,إحدفــها!')">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4"><em>@lang('لا توجد سجلات.')</em></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {!! $countries->render() !!}
@stop
