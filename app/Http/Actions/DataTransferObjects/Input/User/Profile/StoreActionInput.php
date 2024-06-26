<?php

declare(strict_types=1);

namespace App\Http\Actions\DataTransferObjects\Input\User\Profile;

use App\Enums\Profile\Composition;
use App\Enums\Profile\Income;
use App\Enums\Profile\Job;
use App\Http\Actions\DataTransferObjects\Cast\CompositionCast;
use App\Http\Actions\DataTransferObjects\Cast\IncomeCast;
use App\Http\Actions\DataTransferObjects\Cast\JobCast;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Transformers\EnumTransformer;

#[MapName(SnakeCaseMapper::class)]
class StoreActionInput extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly int $age,
        #[WithCast(JobCast::class)]
        #[WithTransformer(EnumTransformer::class)]
        public readonly Job $job,
        #[WithCast(IncomeCast::class)]
        #[WithTransformer(EnumTransformer::class)]
        public readonly Income $income,
        #[WithCast(CompositionCast::class)]
        #[WithTransformer(EnumTransformer::class)]
        public readonly Composition $composition,
        public readonly string $body,
        public readonly ?UploadedFile $image,
    ) {
    }
}
