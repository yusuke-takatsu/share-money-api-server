<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\LoginRequest;
use App\Http\Resources\User\Auth\LoginResource;

class AuthController extends Controller
{
    /**
     * user login
     *
     * @param LoginRequest $request
     * @return LoginResource
     */
    public function login(LoginRequest $request): LoginResource
    {
        $request->authenticate();
        $request->session()->regenerate();

        return new LoginResource(null);
    }
}
