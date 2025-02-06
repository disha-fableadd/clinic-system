<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, $module_id, $permission)
    {
        $user = auth()->user();
        $hasPermission = $user->permissions()->where('module_id', $module_id)->where($permission, true)->exists();

        if (!$hasPermission) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
