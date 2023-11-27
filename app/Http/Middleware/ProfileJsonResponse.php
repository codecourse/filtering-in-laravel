<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class ProfileJsonResponse
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
        $response = $next($request);

        if (app()->bound('debugbar') && app('debugbar')->isEnabled()) {
            $response->setData($response->getData(true) + [
                '_debugbar' => app('debugbar')->getData(),
            ]);
        }

        return $response;
    }
}
