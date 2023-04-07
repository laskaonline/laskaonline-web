<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\ImageOptimizer\OptimizerChain;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Spatie\ImageOptimizer\Optimizers\Jpegoptim;
use Storage;

class UploadImagesController extends Controller
{
    public function __invoke(Request $request)
    {
        $uploadedFile = $request->file('file');

        $uploadedFilePath = $uploadedFile->store('images');
        $originalPath = Storage::path($uploadedFilePath);
        $originalBaseName = pathinfo($originalPath, PATHINFO_BASENAME);

        $originalSize = filesize($originalPath);

        $optimizer = new OptimizerChain();
        $optimizer
            ->setTimeout(10)
            ->addOptimizer((new Jpegoptim([
                '--strip-all',
                '--all-progressive',
                '--max=80',
            ]))->setBinaryPath('C:\\laragon\usr\\bin\\jpegoptim'))
            ->optimize($originalPath);

        $optimizedSize = filesize($originalPath);

        $optimizedPath = Storage::path("images/optimized/$originalBaseName");

        return response()->json([
            'message' => 'Image uploaded successfully',
            'data' => [
                'path' => $uploadedFilePath,
                'optimized_path' => $optimizedPath,
                'original_size' => $originalSize,
                'optimized_size' => $optimizedSize,
                'optimized_ratio' => round($optimizedSize / $originalSize * 100, 2),
            ]
        ]);
    }
}
