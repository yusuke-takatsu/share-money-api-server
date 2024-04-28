<?php

namespace App\Exceptions;

use App\Exceptions\Traits\CommonHandlerTrait;
use App\Exceptions\Traits\UserHandlerTrait;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    use CommonHandlerTrait;
    use UserHandlerTrait;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->commonHandlerRegister();

        $this->userHandlerRegister();
    }
}
