<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class lang
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('locale')){
            App::setLocale(session()->get('locale'));
        }
        return $next($request);
    }
}
