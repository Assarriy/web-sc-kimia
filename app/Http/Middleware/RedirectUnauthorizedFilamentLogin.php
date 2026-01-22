<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectUnauthorizedFilamentLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('admin/login') && $request->session()->get('filament_admin_login_blocked')) {
            return redirect()->route('login');
        }

        $email = $request->input('email');
        $isUnauthorizedUserAttempt = false;

        if ($request->isMethod('post') && $request->is('admin/login') && filled($email)) {
            $user = User::query()->where('email', $email)->first();

            $isUnauthorizedUserAttempt = (bool) ($user && (! $user->hasAnyRole(['admin', 'coach'])));
        }

        $response = $next($request);

        if ($isUnauthorizedUserAttempt && $request->isMethod('post') && $request->is('admin/login')) {
            $request->session()->put('filament_admin_login_blocked', true);

            return redirect()->route('login');
        }

        return $response;
    }
}
