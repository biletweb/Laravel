<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentPostsController extends Controller
{
    public function index()
    {
        $comments = Comment::query()->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('dashboard.comments', compact('comments'));
    }
}
