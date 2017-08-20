<?php

namespace App\Http\Middleware;

use Closure;
use Purifier;

class AlwaysClean
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->input('content')) {
            $content = $request->input('content');
            $cleanContent = Purifier::clean($content);
            $request->merge(['content' => $cleanContent]);
        }
        return $next($request);
    }
}
