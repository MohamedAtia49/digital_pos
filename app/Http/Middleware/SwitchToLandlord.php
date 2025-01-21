<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SwitchToLandlord
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Purge any previous connections
        DB::purge('tenant');
        DB::purge('landlord');

        // Switch to the 'landlord' database connection
        Config::set('database.default', 'landlord');
        DB::reconnect('landlord');
        DB::setDefaultConnection('landlord');

        return $next($request);
    }
}
