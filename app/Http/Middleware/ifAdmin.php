<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User_role;
use Auth;

class ifAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = User_role::where('userid',Auth::user()->type)->first();
        if (Auth::user()&&$role->roleid==1){
            return $next($request);
        }
        abort(403);
       
    }
}
