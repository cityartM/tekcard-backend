<?php

namespace App\Http\Middleware;

use App;
use App\Helpers\Helper;
use Closure;
use Illuminate\Http\Request;

class LangMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $lang = Helper::checkApiLanguage();
        if (!is_null($lang) && in_array($lang, ["ar", "en", "fr"])) {
            App::setLocale($lang);
        }

        return $next($request);
    }
}
