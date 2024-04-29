<?php

namespace App\Http\Middleware;

use App\Exceptions\User\Auth\AuthErrorException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * {@inheritDoc}
     *
     * @param [type] $request
     * @param array $guards
     * @return void
     */
    protected function unauthenticated($request, array $guards)
    {
        if ($guards[0] === config('auth.guards.user')) {
            throw new AuthErrorException();
        }
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
