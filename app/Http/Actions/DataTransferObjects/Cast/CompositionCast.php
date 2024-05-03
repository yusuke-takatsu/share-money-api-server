<?php

namespace App\Http\Actions\DataTransferObjects\Cast;

use App\Enums\Profile\Composition;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class CompositionCast implements Cast
{
    /**
     * @param DataProperty $property
     * @param mixed $value
     * @param array $properties
     * @param CreationContext $context
     * @return Composition
     */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): Composition
    {
        return Composition::fromValue(intval($value));
    }
}
