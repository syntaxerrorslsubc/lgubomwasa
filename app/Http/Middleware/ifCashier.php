<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User_role;
use Auth;

class ifCashier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = User_role::where('userid',Auth::user()->id)->first();
        if (Auth::user()&&$role->roleid==2){
            return $next($request);
        }
        abort(403);
       
    }
}
