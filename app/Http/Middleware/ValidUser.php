<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // echo "<h1 style = 'text-align: center'>Valid User</h1>";
        echo "<h1 style='text-align:center'>".$role."</h1>";

      
        if(Auth::check() && Auth::user()->role == $role){
            return $next($request);
    }
      elseif(Auth::check() && Auth::user()->role == "user"){
            return redirect()->route('user');
    }
    else{
        return redirect()->route('login_form');
    }

   



    }
}
