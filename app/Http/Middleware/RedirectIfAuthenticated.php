<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) 
        {
            switch ($guard)
            {
                case 'admin' :
                    return redirect(RouteServiceProvider::ADMIN);
                    break;
                
                case 'customer' :
                    return redirect(RouteServiceProvider::CUSTOMER);
                    break;
                
                default:
                return redirect(RouteServiceProvider::HOME);
                   
            }    

            /* BackEnd */
            /* if ($guard == 'admin'){
                return redirect(RouteServiceProvider::ADMIN);
            }else{
                    return redirect(RouteServiceProvider::HOME);
            }

            // FrontEnd 
            if ($guard == 'customer'){
                return redirect(RouteServiceProvider::CUSTOMER);
            }else{
                    return redirect(RouteServiceProvider::MAIN);
            } */
           

           
        }

        return $next($request);

      
    }
}
