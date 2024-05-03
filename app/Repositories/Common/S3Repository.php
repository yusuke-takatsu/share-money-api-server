<?php

namespace App\Repositories\Common;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class S3Repository implements S3RepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getPublicUrl(string $filePath, string $diskName): string
    {
        return Storage::disk($diskName)->url(config('filesystems.disks.s3_public.bucket').'/'.$filePath);
    }

    /**
     * {@inheritDoc}
     */
    public function put(string $diskName, UploadedFile $file, string $fileName): string
    {
        return Storage::disk($diskName)->putFile($diskName, $file, $fileName);
    }
}
