<?php

namespace App\Http\Middleware;

use App\Exceptions\User\Auth\AuthErrorException;
use Illuminate\Auth\AuthenticationException;
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
        if ($guards[0] === 'user') {
            throw new AuthErrorException();
        }

        throw new AuthenticationException();
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
