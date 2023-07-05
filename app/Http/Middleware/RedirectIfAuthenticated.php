<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User_role;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
             $role = User_role::where('userid',Auth::user()->id)->first();
                if(isset($role)){
                    if (Auth::user() && $role->roleid==1){
                         return redirect('/admin');
                    }elseif (Auth::user() && $role->roleid==2){
                         return redirect('/cashier');
                    }elseif (Auth::user() && $role->roleid==3) {
                          return redirect()->intended('/meterreader');
                    }
                 }
           }
        }

        return $next($request);
    }
}
