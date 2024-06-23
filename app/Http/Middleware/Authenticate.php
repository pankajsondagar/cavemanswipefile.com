<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $prefix = $request->route()->getPrefix();
        if ($prefix == '/admin') {
            $route = route('admin.login');
        } else {
            $route = route('member.login');
        }
        return $request->expectsJson() ? null : $route;
    }
}
