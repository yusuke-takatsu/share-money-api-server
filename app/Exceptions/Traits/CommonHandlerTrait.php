<?php

namespace App\Exceptions\Traits;

use App\Http\Resources\Common\ValidationExceptionResource;
use Exception;
use Illuminate\Validation\ValidationException;

trait CommonHandlerTrait
{
    /**
     * @var array
     */
    protected array $commonExceptionResourceSets = [
        ValidationException::class => ValidationExceptionResource::class,
    ];

    /**
     * @return void
     */
    protected function commonHandlerRegister(): void
    {
        $this->renderable(function (Exception $e) {
            $resouece = $this->commonExceptionResourceSets[get_class($e)] ?? null;

            return $resouece
                ? (new $resouece($e))->response()->setStatusCode($resouece::$status)
                : null;
        });
    }
}
