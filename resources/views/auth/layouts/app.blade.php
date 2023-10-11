@extends('layouts.app')
@section('style')
<style>.page_speed_1056261689 { background-image: url({{ asset('assets/media/illustrations/sketchy-1/14.png') }})}</style>
@endsection
@section('content_lay')
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication-->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed page_speed_1056261689">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="#" class="mb-12">
                    <img alt="Logo" src="{{ asset('assets/media/logos/sratuito.svg') }}" class="h-125px"/>
                </a>
                <!--end::Logo-->

                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    @yield('content_auth')
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication-->
    </div>
@endsection

@section('scripts')
<script>
function changlang(lang){
	//var url = "{{  route('lang',".lang.") }}";
	var url = "{{route('lang', '')}}"+"/" + lang;
	window.location.href=url;
}
</script>
@endsection
