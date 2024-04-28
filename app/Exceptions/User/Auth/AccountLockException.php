<?php

declare(strict_types=1);

namespace App\Exceptions\User\Auth;

use App\Exceptions\User\UserBaseException;
use Symfony\Component\HttpFoundation\Response;

class AccountLockException extends UserBaseException
{
    protected $code = Response::HTTP_UNPROCESSABLE_ENTITY;

    /**
     * {@inheritDoc}
     */
    public function getUIMessage(): string
    {
        return 'アカウントをロックしました。しばらく経ってから再度ログインしてください。';
    }
}
