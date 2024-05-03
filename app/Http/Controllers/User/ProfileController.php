<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Actions\User\Profile\StoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\StoreProfileRequest;
use App\Http\Resources\User\Profile\StoreProfileResource;

class ProfileController extends Controller
{
    /**
     * @param StoreProfileRequest $request
     * @param StoreAction $action
     * @return StoreProfileResource
     */
    public function store(StoreProfileRequest $request, StoreAction $action): StoreProfileResource
    {
        $action->execute($request->makeData());

        return new StoreProfileResource(null);
    }
}
