<?php

namespace App\Http\Middleware;

use Closure;

class Mod
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
      if ($request->user()->role == 'mod') {
        return $next($request);
      } else {
        return redirect('/');
      }
    }
}
