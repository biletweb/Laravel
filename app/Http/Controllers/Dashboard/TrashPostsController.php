<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;

class TrashPostsController extends Controller
{
    public function index()
    {
        $this->authorize('view', auth()->user());
        $posts = Post::onlyTrashed()->orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.trash', compact('posts'));
    }
}
