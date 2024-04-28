<?php

namespace App\Exceptions;

use Exception;

abstract class CustomException extends Exception
{
    /**
     * @return string
     */
    abstract public function getUIMessage(): string;
}
