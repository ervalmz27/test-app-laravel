<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        // API harus tidak redirect ke login
        return null;
    }

    protected function unauthenticated($request, array $guards)
    {
        // Jangan pakai abort()
        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request)
        );
    }
}

