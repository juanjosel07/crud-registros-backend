<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!is_user_logged_in()) {
            wp_redirect(wp_login_url());
            exit;
        }

        if (!current_user_can('administrator')) {
            wp_redirect(home_url()); // Logueado pero no admin, va a welcome o home
            exit;
        }
    

        return $next($request);
    }
}
