<?php

declare(strict_types=1);

namespace App\Exceptions\User\Auth;

use App\Exceptions\User\UserBaseException;
use Symfony\Component\HttpFoundation\Response;

class LoginFailureException extends UserBaseException
{
    protected $code = Response::HTTP_UNPROCESSABLE_ENTITY;

    /**
     * {@inheritDoc}
     */
    public function getUIMessage(): string
    {
        return 'メールアドレスもしくはパスワードが不正です。';
    }
}
