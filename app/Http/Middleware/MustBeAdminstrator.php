<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdminstrator
{
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()?->userName !== 'admin123'){
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
