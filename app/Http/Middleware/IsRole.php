<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class IsRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$rules)
    {
     if (!Auth::check()) {
         return redirect()->route('login')->with('error',"You dont have Access.");
     }
     $user = Auth::user();
        if ($user->level == $rules) 
            return $next($request);
    
         return redirect('login')->with('error',"You dont have Access.");

    }
}
