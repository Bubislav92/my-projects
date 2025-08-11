<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string $requiredRole The role required to access this route (e.g., 'user', 'admin')
     */
    public function handle(Request $request, Closure $next, string $requiredRole): Response
    {
      if (!Auth::check()) {
        return redirect()->route('login');
    }

    /** @var \App\Models\User $user */
    $user = Auth::user();

    if ($requiredRole === User::ROLE_ADMIN && $user->isAdmin()) {
        return $next($request);
    }

    if ($requiredRole === User::ROLE_FREELANCER && $user->isFreelancer()) {
        return $next($request);
    }

    if ($requiredRole === User::ROLE_CLIENT && $user->isClient()) {
        return $next($request);
    }

    // Opciono: Ako zelis da admini mogu da pristupe svemu
    if ($user->isAdmin()) {
        return $next($request);
    }

    // Ako nijedan uslov nije ispunjen
    abort(403, 'Unauthorized. Nemate dozvolu za pristup ovoj stranici.');
    }
}
