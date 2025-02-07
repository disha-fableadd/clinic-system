<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserPermission;
use Illuminate\Support\Facades\Auth;
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $module, $action)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $permissions = UserPermission::where('user_id', auth()->id())
            ->with('module')
            ->get()
            ->mapWithKeys(function ($permission) {
                return [
                    $permission->module->name => [
                        'view' => $permission->view,
                        'create' => $permission->create,
                        'update' => $permission->update,
                        'delete' => $permission->delete,
                    ],
                ];
            });

        echo "<script>localStorage.setItem('permissions', " . json_encode($permissions) . ");</script>";


        return $next($request);
    }
}
