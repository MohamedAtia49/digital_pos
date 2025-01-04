<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        DB::purge('tenant');
        DB::purge('landlord');
        Config::set('database.default','landlord');
        DB::reconnect('landlord');
        DB::setDefaultConnection('landlord');


        if(!auth()->guard('web')->check()){
            return to_route('manager.get.login');
        }

        return $next($request);
    }
}
