<?php

namespace App\Exceptions\User\Auth;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class AccountLockException extends Exception
{
    protected $message = 'アカウントをロックしました。しばらく経ってから再度ログインしてください。';
    
    protected $code = Response::HTTP_UNPROCESSABLE_ENTITY;

    /**
     * @param [type] $request
     * @return void
     */
    public function render($request)
      {
          return response()->json([
              'message' => $this->message
          ], $this->code);
      }
}
