<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('message', "Post successfully delete");
        return redirect()->route('posts.index');
    }
}
