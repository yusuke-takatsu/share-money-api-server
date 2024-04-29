<?php

namespace App\Services\Common;

use App\Repositories\Common\S3RepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UploadFileService
{
    /**
     * @param S3RepositoryInterface $s3RepositoryInterface
     */
    public function __construct(private readonly S3RepositoryInterface $s3RepositoryInterface)
    {
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param bool $isPrivate
     * @return string
     */
    public function execute(UploadedFile $uploadedFile, bool $isPrivate = false): string
    {
        Log::info('start'.__METHOD__);

        $extension = $uploadedFile->extension();

        $fileName = Str::uuid().'.'.$extension;

        $filePath = $isPrivate
          ? config('aws.storage.private.disk_name').'/'.$fileName
          : config('aws.storage.public.disk_name').'/'.$fileName;

        return $this->s3RepositoryInterface->put($filePath, $uploadedFile);

        Log::info('end'.__METHOD__);
    }
}
