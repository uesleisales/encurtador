<?php

namespace App\Http\Middleware;

use Closure;

class JsonMiddleware
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
        $request->headers->set('Accept', 'application/json');

        if($request->header('Content-Type') != "application/json"){
            return response()->json(['message' => 'Formato da requisição é inválido!'], 422);
        }else{
            return $next($request);
        }

    }

}