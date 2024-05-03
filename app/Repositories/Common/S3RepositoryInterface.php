<?php

namespace App\Repositories\Common;

use Illuminate\Http\UploadedFile;

interface S3RepositoryInterface
{
    /**
     * @param string $filePath
     * @return string
     */
    public function getUrl(string $filePath, string $diskName): string;

    /**
     * @param string $dir
     * @param UploadedFile $file
     * @param string $fileName
     * @return string
     */
    public function put(string $diskName, UploadedFile $file, string $fileName): string;
}
