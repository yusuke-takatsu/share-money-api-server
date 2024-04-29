<?php

namespace App\Http\Actions\DataTransferObjects\Cast;

use App\Enums\Profile\Income;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class IncomeCast implements Cast
{
    /**
     * @param DataProperty $property
     * @param mixed $value
     * @param array $properties
     * @param CreationContext $context
     * @return Income
     */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): Income
    {
        return Income::fromValue($value);
    }
}
