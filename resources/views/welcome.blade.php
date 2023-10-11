<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="@if(app()->getLocale() === 'ar') rtl @else ltr @endif">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($title)) {{ $title }} | {{ config('app.name') }} @else {{ config('app.name') }} @endif
    </title>
    
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>
<body>
<link rel="apple-touch-icon" sizes="57x57" src="{{ asset('icons/icon.svg') }}">
<link rel="apple-touch-icon" sizes="60x60" src="{{ asset('icons/icon.svg') }}">
<link rel="apple-touch-icon" sizes="72x72" src="{{ asset('icons/icon.svg') }}">
<link rel="apple-touch-icon" sizes="76x76" src="{{ asset('icons/icon.svg') }}">
<link rel="apple-touch-icon" sizes="114x114" src="{{ asset('icons/icon.svg') }}">
<link rel="apple-touch-icon" sizes="120x120" src="{{ asset('icons/icon.svg') }}">
<link rel="apple-touch-icon" sizes="144x144" src="{{ asset('icons/icon.svg') }}">
<link rel="apple-touch-icon" sizes="152x152" src="{{ asset('icons/icon.svg') }}">
<link rel="apple-touch-icon" sizes="180x180" src="{{ asset('icons/icon.svg') }}">
<link rel="icon" type="image/png" sizes="192x192"  src="{{ asset('icons/android.png') }}">
<link rel="icon" type="image/png" sizes="32x32" src="{{ asset('icons/android.png') }}">
<link rel="icon" type="image/png" sizes="96x96" src="{{ asset('icons/android.png') }}">
<link rel="icon" type="image/png" sizes="16x16" src="{{ asset('icons/android.png') }}">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<div class="my-24 mx-auto max-w-7xl p-8">
    <div class="w-full mt-16">
        <div class="w-full">
            @forelse($sections as $key => $value)
                @if(!is_array($value))
                    <div class="w-full flex gap-6">
                        <div>
                            {{ $key }}
                        </div>

                        <div class="flex-grow">
                            <input type="text" value="{{$value}}">
                        </div>
                    </div>
                @else
                    @if(count($value) < 0) @endif
                    <div>{{ $key }}</div>
                    @forelse($value as $k => $v)
                        <div class="w-full flex gap-6">
                            <div>
                                {{ $k }}
                            </div>

                            <div class="flex-grow">
                                <input type="text" name="" value="{{$v}}">
                            </div>
                        </div>
                    @empty
                        <div>
                            empty section
                        </div>
                    @endforelse
                @endif
            @empty
                <div>
                    empty section
                </div>
            @endforelse
        </div>
        {{--<pre x-data="{section: @js($section) }" x-text="JSON.stringify(section, null, 2)"></pre>--}}
    </div>
</div>

@vite(['resources/js/app.js'])
@stack('scripts')
</body>
</html>
