@extends('layouts.appDash')

@section('page-title', $user->present()->nameOrEmail)
@section('page-heading', $user->present()->nameOrEmail)

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('users.index') }}">@lang('app.Users')</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $user->present()->nameOrEmail }}
    </li>
@stop

@section('content')

<div class="row">
    <div class="col-lg-5 col-xl-4 @if (! isset($activities)) mx-auto @endif">
        <div class="card">
            <h6 class="card-header d-flex align-items-center justify-content-between">
                @lang('app.Details')

                <small>
                    <a href="{{ route('users.edit', $user) }}"
                       class="edit"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="@lang('app.Edit User')">
                        @lang('app.Edit')
                    </a>
                </small>
            </h6>
            <div class="card-body">
               <div class="d-flex align-items-center flex-column pt-3">
                    <div>
                        <img class="rounded-circle img-thumbnail img-responsive mb-4"
                             width="130"
                             height="130" src="{{ $user->present()->avatar }}">
                    </div>

                    @if ($name = $user->present()->name)
                        <h5>{{ $user->present()->name }}</h5>
                    @endif

                    <a href="mailto:{{ $user->email }}" class="text-muted font-weight-light mb-2">
                        {{ $user->email }}
                    </a>
                </div>

                <ul class="list-group list-group-flush mt-3">
                    @if ($user->phone)
                        <li class="list-group-item">
                            <strong>@lang('app.Phone'):</strong>
                            <a href="telto:{{ $user->phone }}">{{ $user->phone }}</a>
                        </li>
                    @endif
                    <li class="list-group-item">
                        <strong>@lang('app.Birthday'):</strong>
                        {{ $user->present()->birthday }}
                    </li>
                    <li class="list-group-item">
                        <strong>@lang('app.Address'):</strong>
                        {{ $user->present()->fullAddress }}
                    </li>
                    <li class="list-group-item">
                        <strong>@lang('app.Last Logged In'):</strong>
                        {{ $user->present()->lastLogin }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @if (isset($activities))
        <div class="col-lg-7 col-xl-8">
            @include("dashboard.user-activity::recent-activity", ['activities' => $activities])
        </div>
    @endif
</div>
@stop
