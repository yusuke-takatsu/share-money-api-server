<?php

declare(strict_types=1);

namespace App\Http\Resources\Common;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NotFoundHttpExceptionResource extends JsonResource
{
    public static int $status = Response::HTTP_NOT_FOUND;

    public static $wrap = null;

    public function __construct(NotFoundHttpException $exception)
    {
        parent::__construct(null);

        $this->resource = [
            'message' => '該当のページが見つかりません。',
        ];
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
