<?php

namespace App\Services;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class ImageService
{

    protected $disk;

    public function __construct(string $disk = 'public')
    {
        $this->disk = $disk;
    }

    protected function storage(): FilesystemAdapter
    {
        return Storage::disk($this->disk);
    }

    public function uploadImageGetName(UploadedFile $file): string
    {
        $result = $this->storage()->putFile('/', $file);

        if (!$result)
            throw new UploadException('File upload failed', 500);

        return $result;
    }

    public function deleteImage(string $path): bool
    {
        return $this->storage()->delete($path);
    }

    public function getImageUrl(?string $path): string
    {
        return $this->storage()->url($path);
    }
}
