<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class ImageController extends Controller
{
    public function store() {
        $post = new Blog();
        $post->id = 0;
        $post->exists = true;
        $image = $post->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl('thumb')
        ]);
    }
}
