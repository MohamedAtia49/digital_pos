<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $tenant = app('currentTenant');
        $tenantId = $tenant->id;

        if (!$tenant) {
            abort(404 ,'Tenant Not Found !');
        }

        $currentTenant = Tenant::with('subscription')->find($tenantId);

        if (!$currentTenant) {
            abort(404 ,'Tenant not found in the database. ');
        }
        $subscription = $currentTenant->subscription;

        if (!$subscription || !$subscription->status || now()->greaterThan($subscription->end_date)) {
            abort(403 ,'Your subscription is inactive or expired .');
        }
        return $next($request);
    }
}
