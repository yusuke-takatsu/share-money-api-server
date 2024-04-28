<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use App\Exceptions\User\UserBaseException;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCustomExceptionResouece extends JsonResource
{
    public static $wrap = null;

    /**
     * @param UserBaseException $e
     */
    public function __construct(UserBaseException $e)
    {
        parent::__construct($e);

        $this->resource = [
            'message' => $e->getUIMessage(),
        ];
    }
}
