<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Profile\Composition;
use App\Enums\Profile\Income;
use App\Enums\Profile\Job;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(20, 60),
            'job' => Job::getRandomValue(),
            'income' => Income::getRandomValue(),
            'composition' => Composition::getRandomValue(),
            'body' => $this->faker->realText(),
            'image' => $this->faker->imageUrl(),
            'created_at' => CarbonImmutable::now()->format('Y-m-d H:i:s'),
            'updated_at' => CarbonImmutable::now()->format('Y-m-d H:i:s'),
        ];
    }
}
