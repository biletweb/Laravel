<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
}
