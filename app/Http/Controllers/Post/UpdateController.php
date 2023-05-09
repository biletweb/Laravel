<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', auth()->user());
        $data = $request->validated();
        $post->update($data);
        session()->flash('message', "Post successfully update");
        return redirect()->route('posts.show', $post->id);
    }
}
