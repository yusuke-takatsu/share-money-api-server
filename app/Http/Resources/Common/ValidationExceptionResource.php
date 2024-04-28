<?php

namespace App\Http\Resources\Common;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ValidationExceptionResource extends JsonResource
{
    public static int $status = Response::HTTP_UNPROCESSABLE_ENTITY;

    public static $wrap = null;

    public function __construct(ValidationException $e)
    {
        parent::__construct($e);
        $this->resource = [
            'message' => $e->getMessage(),
            'errors' => $this->flattenErrors($e->errors()),
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

    /**
     * @param array $errors
     * @return array
     */
    private function flattenErrors(array $errors): array
    {
        return array_reduce($errors, function ($carry, $item) {
            return array_merge($carry, $item);
        }, []);
    }
}
