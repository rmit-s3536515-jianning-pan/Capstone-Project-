<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class AdminMiddleware
{
//     class AdminMiddleware{
//     public function handle($request, Closure $next){
//         if (!\Auth::user()->is_admin) {
//             return redirect('/');
//         }

//         return $next($request);
//     }
// }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->isAdmin == TRUE)
        {
            return $next($request);
            // return redirect('/');
            
        }
        return response()->view('admin.adminonly');

        
        
    }
}
