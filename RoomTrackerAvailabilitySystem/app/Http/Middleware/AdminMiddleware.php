<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * Verifies admin session and validates user still has admin role.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if admin session exists
        if (!session('admin_logged_in') || !session('admin_user_id')) {
            return redirect()->route('admin.login')
                ->with('error', 'Please login to access the admin panel.');
        }

        // Verify the user still exists and has admin role
        $user = User::find(session('admin_user_id'));
        
        if (!$user || !$user->isAdmin()) {
            // Clear invalid session
            session()->forget([
                'admin_logged_in',
                'admin_user_id',
                'admin_username',
                'admin_name',
            ]);
            
            return redirect()->route('admin.login')
                ->with('error', 'Your session is invalid. Please login again.');
        }

        return $next($request);
    }
}

