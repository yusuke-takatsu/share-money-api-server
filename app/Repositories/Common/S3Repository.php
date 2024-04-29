<?php

namespace App\Repositories\Common;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class S3Repository implements S3RepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function put(string $filePath, UploadedFile $file): string
    {
        return Storage::disk('s3')->put($filePath, $file);
    }
}
