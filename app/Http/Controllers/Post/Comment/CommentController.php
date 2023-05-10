<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Post $post, CommentRequest $request)
    {
        $data = $request->validated();
        $data['post_id'] = $post->id;
        $data['user_id'] = auth()->user()->id;
        Comment::query()->create($data);
        session()->flash('message', "Comment successfully added");
        return redirect()->route('posts.show', $post->id);
    }
}
