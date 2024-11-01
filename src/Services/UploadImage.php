<?php

namespace SolutionForest\FilamentUnlayer\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImage
{
    public function __invoke(Request $request)
    {
        $request->validate(['file' => config('filament-unlayer.upload.validation')]);

        $storeMethod = config('filament-unlayer.upload.visibilty') == 'public' ? 'storePublicly' : 'store';
        $path = $request->file('file')->{$storeMethod}(config('filament-unlayer.upload.path'), config('filament-unlayer.upload.disk'));

        return response()->json([
            'file' => [
                'url' => Storage::disk(config('filament-unlayer.upload.disk'))->url($path),
            ],
        ]);
    }
}
