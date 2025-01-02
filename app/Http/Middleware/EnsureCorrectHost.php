<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCorrectHost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the full URL, including query parameters
        // $fullUrl = $request->fullUrl();

        // Alternatively, to get just the base URL (without query parameters)
        $baseUrl = $request->url();

        // You can now check the full URL
        if ($baseUrl !== 'http://manager.pos.test/manager/login') {

            abort(404, 'Page Not Found !');

        }

        // Continue with the request
        return $next($request);
    }
}
