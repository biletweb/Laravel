<?php

namespace App\Http\Controllers\Post\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;

class LikedController extends Controller
{
    public function index(Post $post)
    {
        auth()->user()->likedPost()->toggle($post->id);
        return redirect()->route('posts.show', $post->id);
    }
}
