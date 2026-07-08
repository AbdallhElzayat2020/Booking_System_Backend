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
}
