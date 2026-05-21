<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle(Request $request, Closure $next, $roles): Response
    {
        if (!Auth::check()) {
            return $this->handleError($request, 'No autenticado', 401, '/login');
        }

        $user = Auth::user();

        if (!$user->role) {
            return $this->handleError($request, 'Acceso denegado', 403, '/');
        }

        $allowedRoles = explode('|', $roles);
        $roleName = strtolower($user->role->name);

        if (!in_array($roleName, $allowedRoles)) {
            return $this->handleError($request, '❌ No tienes permisos para acceder a esta página.', 403, '/');
        }

        return $next($request);
    }

    private function handleError(Request $request, $message, $statusCode, $redirectPath): Response
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json(['error' => $message], $statusCode);
        }

        session()->flash('error', $message);
        return redirect($redirectPath);
    }
}

     /*  Antes de modificar el middleware
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $newRole = explode('|',$roles);
        $user = Auth::user();
        $roleName = strtolower($user->role->name);

        \Log::info("User role: " . $roleName); // Log para verificar el rol

        if (!in_array($roleName, $newRole)) 
            return response(status: 403);
        
        return $next($request);
    }
        */

