<?php

namespace Bhavinjr\Viewdit\Http\Middleware;

use Bhavinjr\Viewdit\Viewdit;
use Closure;

class Authenticate
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|null
     */
    public function handle($request, Closure $next)
    {
        return Viewdit::check($request) ? $next($request) : abort(403);
    }
}
