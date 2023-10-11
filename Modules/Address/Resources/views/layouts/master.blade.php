@extends('layouts.dash')

@section('page-title', __('app.Addresses'))
@section('page-heading', __('app.Addresses'))
@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.Addresses')
    </li>
@stop
@section('content')
    @include('partials.messages')
    @yield('content')
@stop
@section('scripts')
    <script src="{{ asset('assets/as/btn.js') }}"></script>
    <script src="{{ asset('assets/as/profile.js') }}"></script>
    @yield('scripts')
@stop
