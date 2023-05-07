<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Post::create($data);
        session()->flash('message', "Post successfully create");
        return redirect()->route('posts.index');
    }
}
