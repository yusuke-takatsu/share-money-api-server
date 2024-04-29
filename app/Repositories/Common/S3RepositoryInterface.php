<?php

namespace App\Repositories\Common;

use Illuminate\Http\UploadedFile;

interface S3RepositoryInterface
{
    /**
     * @param string $filePath
     * @param UploadedFile $file
     * @return string
     */
    public function put(string $filePath, UploadedFile $file): string;
}
