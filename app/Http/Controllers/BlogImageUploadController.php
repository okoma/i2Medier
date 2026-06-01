<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogImageUploadController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'image' => ['required', 'file', 'image', 'max:5120', 'mimes:jpg,jpeg,png,gif,webp,avif'],
        ]);

        $file = $request->file('image');
        $name = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('blog/content-images', $name, 'public');

        return response()->json([
            'url' => asset('storage/' . $path),
        ]);
    }
}
