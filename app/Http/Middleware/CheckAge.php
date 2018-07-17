<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        $response = $next($request);

        if($request->age < 18) {
            return redirect()->route('wordcup');
        } elseif($params !== 'admin'){
            return redirect()->route('wordcup');
        }
        return $response;
        //return $next($request);
    }
}
