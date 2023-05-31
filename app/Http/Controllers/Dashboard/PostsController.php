<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts();
        return view('dashboard.posts', compact('posts'));
    }
}
