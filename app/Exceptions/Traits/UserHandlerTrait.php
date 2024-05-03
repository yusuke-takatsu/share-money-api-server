<?php

namespace App\Exceptions\Traits;

use App\Exceptions\User\Auth\AccountLockException;
use App\Exceptions\User\Auth\AuthErrorException;
use App\Exceptions\User\Auth\LoginFailureException;
use App\Exceptions\User\Profile\AlreadyExistException;
use App\Exceptions\User\UserBaseException;
use App\Http\Resources\User\UserCustomExceptionResouece;

trait UserHandlerTrait
{
    /**
     * @var array
     */
    protected array $userCustumExceptions = [
        AccountLockException::class,
        LoginFailureException::class,
        AuthErrorException::class,
        AlreadyExistException::class,
    ];

    /**
     * @return void
     */
    protected function userHandlerRegister(): void
    {
        foreach ($this->userCustumExceptions as $custumException) {
            $this->renderable(function (UserBaseException $e) use ($custumException) {
                if (! $e instanceof $custumException) {
                    return null;
                }

                return (new UserCustomExceptionResouece($e))
                    ->response()
                    ->setStatusCode($e->getCode());
            });
        }
    }
}
