<?php

declare(strict_types=1);

namespace App\Http\Actions\User\Profile;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexAction
{
    /**
     * @return Profile
     */
    public function execute(): Profile
    {
        Log::info('start'.__METHOD__);

        $usreId = Auth::id();

        $profile = Profile::query()->find($usreId);

        if (is_null($profile)) {
            Log::info('profile is not found');

            throw new NotFoundHttpException();
        }

        Log::info('end'.__METHOD__);

        return $profile;
    }
}
