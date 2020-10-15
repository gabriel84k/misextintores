<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class validar 
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
      
        if ($request->user()->estado != 1) {
            Auth::logout();
            return redirect()->to('/')->with('warning', 'Your session has expired because your account is deactivated.');
        }
        return $next($request);
    }
    
}
