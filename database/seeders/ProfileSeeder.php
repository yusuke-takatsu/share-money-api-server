<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ProfileSeeder extends Seeder
{
    private Collection $userIds;

    public function __construct()
    {
        $this->userIds = User::pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [];

        $this->userIds->each(function($userId) use(&$profiles) {
            $profile = Profile::factory()->make([
                'user_id' => $userId,
            ])->toArray();

            $profile['created_at'] = CarbonImmutable::now()->format('Y-m-d H:i:s');
            $profile['updated_at'] = CarbonImmutable::now()->format('Y-m-d H:i:s');

            $profiles[] = $profile;
        });

        Profile::insert($profiles);
    }
}
