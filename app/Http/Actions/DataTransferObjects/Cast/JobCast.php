<?php

namespace App\Http\Actions\DataTransferObjects\Cast;

use App\Enums\Profile\Job;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class JobCast implements Cast
{
    /**
     * @param DataProperty $property
     * @param mixed $value
     * @param array $properties
     * @param CreationContext $context
     * @return Job
     */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): Job
    {
        return Job::fromValue(intval($value));
    }
}
