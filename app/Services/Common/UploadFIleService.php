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

        $diskName = $isPrivate
          ? config('aws.storage.private.disk_name')
          : config('aws.storage.public.disk_name');

        $uploadedFilePath = $this->s3RepositoryInterface->put($diskName, $uploadedFile, $fileName);

        $url = $this->s3RepositoryInterface->getUrl($uploadedFilePath, $diskName);

        Log::info('end'.__METHOD__);

        return $url;
    }
}
