<?php

namespace App\Http\Middleware;

use Closure;

class IsSuperAdmin
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
$admin=$request->user('admin');
        if ($admin->SuperAdmin==1)
        {
            return $next($request);
        }else return redirect('/');

    }
}
