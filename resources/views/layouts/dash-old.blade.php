@extends('layouts.app')
@section('vite')
    @yield('vite')
@endsection
@section('content_lay')
<div class="page d-flex flex-column flex-column-fluid">
    @include('partials.navbar')
    <div class="app-wrapper app-wrapper flex-column flex-row-fluid" id="kt_wrapper">
        @include('partials.sidebar')
        @include('partials.content')
        @include('partials.footer')
    </div>
</div>

@endsection



