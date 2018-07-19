<?php

namespace App\Http\Middleware;

use Closure;

class DemoCheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $params = null)
    {
        if($params !== 'admin'){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
