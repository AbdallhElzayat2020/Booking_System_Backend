<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileHandler
{
    public function uploadFile(Request $request, string $input, ?string $oldFile, string $disk)
    {

        if (!$request->hasFile($input)) {
            return $oldFile;
        }

        if ($oldFile) {
            Storage::disk($disk)->delete($oldFile);
        }

        $file = $request->file($input);
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('', $fileName, $disk);

        return $fileName;
    }


    public function uploadFiles(Request $request, string $input, array $oldFiles, string $disk): array {

        if (!$request->hasFile($input)) {
            return $oldFiles;
        }

        foreach ($oldFiles as $oldFile) {
            if (Storage::disk($disk)->exists($oldFile)) {
                Storage::disk($disk)->delete($oldFile);
            }
        }

        $files = [];

        foreach ($request->file($input) as $file) {

            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('', $fileName, $disk);

            $files[] = $fileName;
        }

        return $files;
    }

    public function deleteFile(string $filename, string $disk): bool
    {

        if (!$filename) {
            return false;
        }

        if (Storage::disk($disk)->exists($filename)) {
            return Storage::disk($disk)->delete($filename);
        }

        return false;
    }


}
