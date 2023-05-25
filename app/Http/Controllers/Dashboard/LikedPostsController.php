<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PostUserLike;

class LikedPostsController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->likedPost()->paginate(10);
        return view('dashboard.liked', compact('posts'));
    }
}
