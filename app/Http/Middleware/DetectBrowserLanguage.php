<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DetectBrowserLanguage
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->getPreferredLanguage(['en', 'nl', 'de']);
        App::setLocale($locale);

        return $next($request);
    }
}
