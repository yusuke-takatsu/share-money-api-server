<?php

namespace App\Exceptions\User\Profile;

use App\Exceptions\User\UserBaseException;
use Symfony\Component\HttpFoundation\Response;

class AlreadyExistException extends UserBaseException
{
    protected $code = Response::HTTP_CONFLICT;

    /**
     * {@inheritDoc}
     */
    public function getUIMessage(): string
    {
        return 'すでにプロフィールが登録済みです。';
    }
}
