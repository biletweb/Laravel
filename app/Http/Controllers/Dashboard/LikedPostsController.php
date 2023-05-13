<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class LikedPostsController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->likedPost;
        return view('dashboard.liked_posts', compact('posts'));
    }
}
