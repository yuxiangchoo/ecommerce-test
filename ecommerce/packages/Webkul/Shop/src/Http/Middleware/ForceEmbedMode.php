<?php

namespace Webkul\Shop\Http\Middleware;

use Closure;

class ForceEmbedMode
{
    public function handle($request, Closure $next)
    {
        // Inherit ?embed=superapp from main page into ALL API calls
        if ($request->has('embed') && $request->query('embed') === 'superapp') {
            $request->merge(['embed' => 'superapp']);
        }

        return $next($request);
    }
}