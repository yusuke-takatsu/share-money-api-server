<?php

declare(strict_types=1);

namespace App\Exceptions\User\Auth;

use App\Exceptions\User\UserBaseException;
use Symfony\Component\HttpFoundation\Response;

class AuthErrorException extends UserBaseException
{
    protected $code = Response::HTTP_UNAUTHORIZED;

    /**
     * {@inheritDoc}
     */
    public function getUIMessage(): string
    {
        return '認証に失敗しました。再度ログインを行なってください。';
    }
}
