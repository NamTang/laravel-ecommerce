<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckPermission
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
        $user = Auth::user();
        if ($user != null && $user -> email == "admin@gmail.com") {
            return $next($request);
        }

        return redirect('/login');
    }
}
