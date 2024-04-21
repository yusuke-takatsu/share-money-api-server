<?php

namespace App\Exceptions\User\Auth;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class LoginFailureException extends Exception
{
    protected $message = 'メールアドレスもしくはパスワードが不正です。';
    
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
