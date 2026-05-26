<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureClientPortalUser
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || $user->isAgencyStaff() || ! $user->hasAnyRole(['client_owner', 'client_member'])) {
            abort(403);
        }

        return $next($request);
    }
}
