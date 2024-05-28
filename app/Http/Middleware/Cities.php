<?php

namespace App\Http\Middleware;

use App\App;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cities
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(app(App::class)->getRedirect()) {
             return redirect(
                app(App::class)->getRedirect(), 301, ['Cache-Control' => 'max-age=0']
            );
        }
        return $next($request);
    }
}
