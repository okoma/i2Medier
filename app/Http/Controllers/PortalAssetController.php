<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PortalAssetController extends Controller
{
    public function show(string $file): Response
    {
        abort_unless(Str::endsWith($file, '.css'), 404);

        $path = '/Users/okoma/Desktop/i2medier UIs/' . basename($file);

        abort_unless(is_file($path), 404);

        return response(file_get_contents($path), 200, [
            'Content-Type' => 'text/css; charset=UTF-8',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }
}
