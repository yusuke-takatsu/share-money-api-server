<?php

declare(strict_types=1);

namespace App\Http\Actions\User\Profile;

use App\Http\Actions\DataTransferObjects\Input\User\Profile\StoreActionInput;
use App\Models\Profile;
use App\Services\Common\UploadFileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreAction
{
    /**
     * @param UploadFileService $uploadFileService
     */
    public function __construct(private readonly UploadFileService $uploadFileService)
    {
    }

    /**
     * @param StoreActionInput $input
     * @return void
     */
    public function execute(StoreActionInput $input): void
    {
        Log::info('start'.__METHOD__);

        $userId = Auth::id();

        $profile = Profile::query()->lockForUpdate()->find($userId);

        if ($profile !== null) {
            Log::info('already registerd', [
                'user_id' => $profile->id,
            ]);
        }

        DB::transaction(function () use ($input) {
            $filePath = $this->uploadFileService->execute($input->image, true);

            Profile::query()->create($this->createInsertParams($input, $filePath));
        });

        Log::info('end'.__METHOD__);
    }

    /**
     * @param StoreActionInput $input
     * @param string $filePath
     * @return array
     */
    private function createInsertParams(StoreActionInput $input, string $filePath): array
    {
        $inputParams = $input->toArray();
        unset($inputParams['image']);

        return array_merge([
            'image' => $filePath,
        ], $inputParams);
    }
}
