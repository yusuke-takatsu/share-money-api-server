<?php

declare(strict_types=1);

namespace Tests\Feature\User\Profile;

use App\Http\Resources\Common\NotFoundHttpExceptionResource;
use App\Http\Resources\User\Profile\IndexResource;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\TestResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use DatabaseTransactions;

    private string $guard = 'user';

    private User $user;

    private Profile $profile;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->profile = Profile::factory()->create([
            'user_id' => $this->user->id,
        ]);
    }

    /**
     * @return void
     */
    public function test_success_fetch_profile(): void
    {
        $response = $this->commonExecute($this->user);

        $expected = new IndexResource(Profile::query()->find($this->user->id));

        $response->assertOk()
            ->assertJson($expected->toArray($this->app['request']));
    }

    /**
     * @return void
     */
    public function test_not_found_fetch_profile(): void
    {
        $this->profile->query()->delete();

        $response = $this->commonExecute($this->user);

        $expected = new NotFoundHttpExceptionResource(new NotFoundHttpException());

        $response->assertNotFound()
            ->assertJson($expected->toArray($this->app['request']));
    }

    /**
     * @param User $user
     * @return TestResponse
     */
    private function commonExecute(User $user): TestResponse
    {
        return $this->actingAs($user, $this->guard)
            ->get(route('api.profile.index'));
    }
}
