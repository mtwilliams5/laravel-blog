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
        // First let's clean the content field of any nasty code
        if ($request->input('content')) {
            $content = $request->input('content');
            $cleanContent = Purifier::clean($content);
            $request->merge(['content' => $cleanContent]);
        }
        // Now let's strip the title of any HTML, so our fancy editor doesn't mess up our display
        if ($request->input('title')) {
            $title = $request->input('title');
            $bareTitle = html_entity_decode(strip_tags($title));
            $request->merge(['title' => $bareTitle]);
        }
        return $next($request);
    }
}
