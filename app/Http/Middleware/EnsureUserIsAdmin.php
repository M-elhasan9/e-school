<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        abort_if(!$user || !$user->is_teacher, 403, 'Only admins/teachers allowed.');
        return $next($request);
    }
}
