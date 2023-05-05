<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use GuzzleHttp\Psr7\Request;

class ShowController extends Controller
{
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
