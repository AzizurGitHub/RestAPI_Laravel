<?php

namespace App\Http\Middleware;

use Closure;

class ApiNameResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$appName='')
    {

        $response = $next($request);

        $headers = [
            $appName => env('APP_NAME'),
        ];



        $response->headers->add($headers);

        return $response;
    }
}
