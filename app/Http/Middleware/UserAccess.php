<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$userType)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();
        if($user->type == $userType){
            return $next($request);
        }
        return redirect('login')->with('error',"kamu tidak ada akses");
        
    }
}
