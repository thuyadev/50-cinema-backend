<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;

class ImageManagementUtil
{
    public function upload($file, string $folder = 'images'): string
    {
        $img_url = $folder . '_' . strtotime(now()) . '.' . $file->getClientOriginalExtension();

         $image = Storage::disk('public')->putFileAs($folder, $file, $img_url);
        // $image = $file->storeAs($folder, $img_url);

        return $image;
    }

    public function get(string $path): string
    {
        return Storage::disk('public')->get($path);
    }

    public function getMimeType(string $path): string
    {
        return Storage::mimeType($path);
    }

    public function delete(string|array $path): void
    {
        if (Storage::disk('public')->exists($path))
        {
            Storage::disk('public')->delete($path);
        }
    }

}
