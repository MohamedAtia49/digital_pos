<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Tenant;
use Symfony\Component\HttpFoundation\Response;

class EnsureCorrectTenant
{
    public function handle(Request $request, Closure $next): Response
    {
        // Get the current tenant from Spatie Multitenancy
        $currentTenant = Tenant::current(); // This will get the tenant object for the current request

        if (!$currentTenant) {
            abort(403, 'No tenant set for this request.');
        }

        // Retrieve the tenant identifier (for example, from subdomain or domain)
        // Assuming you identify tenants via subdomains or domain
        $tenantIdentifier = $request->getHost();  // Get the current host (subdomain or domain)

        // You can adjust this part based on your domain/subdomain structure
        // For example, if the domain is `store1.pos.test`, you might extract `store1`
        // $tenantSubdomain = explode('.', $tenantIdentifier)[0];  // Extract tenant name from subdomain

        // Check if the current tenant's identifier matches the tenant from the request
        if ($currentTenant->domain != $tenantIdentifier) {  // assuming the tenant model has a `subdomain` column
            abort(404, 'Page Not Found !');
        }

        return $next($request);
    }
}
