<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // echo "<h1 style= 'text-align: center'>Test MiddleWare</h1>";
        return $next($request);
    }


    public function terminate(Request $request, Response $response): void 
    {

        // echo "<h1 style= 'text-align: center'>Terminate</h1>";
        
    }

}
